<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    
    public function index()
    {
        $request = request();
        $categories = Category::with('parent')
        ->withCount([
            'products' => function($query){
                $query->where('status', '=', 'Active');
            }
        ])
        ->filter($request->query())
        ->orderBy('categories.name')
        ->paginate(); // return Collection obj

        return view('dashboard.categories.index', compact('categories'));
    }


    public function create()
    {
        $parents = Category::all();
        $category = new Category();
        return view('dashboard.categories.create', compact('parents', 'category'));
    }


    public function store(Request $request)
    {
        $clean_data = $request->validate(Category::rules(), [
            'unique' => 'This name already exists',
            'required' => 'This field :attribute is required'
        ]);
         // Request merge
         $request->merge([
            'slug' => Str::slug($request->post('name'))
        ]);


        $data = $request->except('category_image');

        $data['category_image'] = $this->uploadImage($request);

        $category = Category::create( $data );
        return Redirect::route('dashboard.categories.index')->with('success', 'Category Created');

    }


    public function show(Category $category)
    {
        return view('dashboard.categories.show', [
            'category' => $category
        ]);
    }


    public function edit($id)
    {
        try{
            $category = Category::findOrFail($id);
        }catch (Exception $e){
            return redirect()->route('dashboard.categories.index')->with('danger', 'Record Not Found !');
        }

        $parents = Category::where('id', '<>', $id)
        ->where(function($query) use($id) {
            $query->whereNull('parent_id')
            ->orwhere('parent_id', '<>', $id);
        })->get();

        return view('dashboard.categories.edit', compact('category', 'parents'));
    }


    public function update(CategoryRequest $request, $id)
    {

        $category = Category::findOrFail($id);

        $old_image = $category->category_image;

        $data = $request->except('category_image');

        $new_image = $this->uploadImage($request);

        if ($new_image) {
            $data['category_image'] = $new_image;
        }

        $category->update( $data );

     if ($old_image && $new_image){

        Storage::disk('public')->delete($old_image);
     }

     return Redirect::route('dashboard.categories.index')->with('success', 'Category Updated!');
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();


        Category::where('id', '=', $id)->delete();

        Category::destroy($id);

        return Redirect::route('dashboard.categories.index')->with('info', 'Category Deleted');

    }
    protected function uploadImage(Request $request){

        if (!$request->hasFile('category_image')){
            return;
        }

        $file = $request->file('category_image'); // return UploadedFile object

        $path = $file->store('uploads', ['disk' => 'public']);
        return $path;
    }
    public function trash(){
        $categories = Category::onlyTrashed()->paginate();
        return view('dashboard.categories.trash', compact('categories'));
    }
    public function restore(Request $request, $id){
        $categories = Category::onlyTrashed()->findOrFail($id);
        $categories->restore();
        return redirect()->route('dashboard.categories.trash')->with('success', 'Category restored!');
    }
    public function forceDelete($id){
        $categories = Category::onlyTrashed()->findOrFail($id);
        $categories->forceDelete();

        if ($categories->category_image){
            Storage::disk('public')->delete($categories->category_image);
        }

        return redirect()->route('dashboard.categories.trash')->with('success', 'Category deleted forever!');
    }
}
