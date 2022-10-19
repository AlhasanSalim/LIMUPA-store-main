<div class="form-group">
    <x-form.input  label="Product Name"  class="form-control-lg" type="text" role="input" name="name" :value="$product->name"/>
</div>


<div class="form-row">
    <div class="col-md-6">
        <label for="">Category</label>
        <select name="parent_id" class="form-control form-select">
            <option value="">Primary Categroy</option>
            @foreach (App\Models\Category::all() as $category)
            <option value="{{ $category->id }}" 
                @if( old('category_id', $product->category_id) == $category->id) selected @endif>{{ $category->name }}</option>
        @endforeach
        </select>
    </div>
</div>


<div class="form-group">
    <x-form.textarea label="Description" name="description" :value="$product->description"/>
</div>


<div class="form-group">
    <x-form.label id="image">Select image</x-form.label>
    <x-form.input :value="$product->product_image" type="file" name="product_image" accept="image/*" />
    @if ($product->product_image)
        <img src="{{ asset('storage/'.$product->product_image) }}" alt="" height="80">
    @endif
</div>

<div class="form-group">
    <x-form.input  label="Price"  class="form-control-lg" type="text" role="input" name="price" :value="$product->price"/>
</div>

<div class="form-group">
    <x-form.input  label="Compare Price"  class="form-control-lg" type="text" role="input" name="compare_price" :value="$product->compare_price"/>
</div>

<div class="form-group">
    <x-form.input  label="Tags"  class="form-control-lg" type="text" role="input" name="tags" :value="$tags"/>
</div>


<div class="form-group">
    <label for="">Status</label>
    <div>
        <div class="form-check">
             <input class="form-check-input  @error('status') is-invalid @enderror" type="radio" name="status" value="active" @if( old('status', $product->status)  == "active") checked @endif>
            <label class="form-check-label">
              Active
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" value="draft" @if( old('status', $product->status)  == "draft") checked @endif>
            <label class="form-check-label">
                Draft
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input @error('status') is-invalid @enderror" type="radio" name="status" value="archived" @if( old('status', $product->status)  == "archived") checked @endif>
            <label class="form-check-label">
              Archived
            </label>
        </div>
    </div>
</div>



<div class="form-group">
    <button type="submit" class="btn btn-sm btn-outline-primary">Update</button>
</div>

