<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rule;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'parent_id', 'description', 'category_image', 'status', 'slug'
    ];

    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id', 'id')->withDefault(['name' => '-']);
    }

    public function children(){
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }


    public function scopeFilter(Builder $bilder, $filters){
        $bilder->when($filters['name'] ?? false, function($bilder, $value){
            $bilder->where('categories.name', 'LIKE', "%{$value}%");
        });

        $bilder->when($filters['status'] ?? false, function($bilder, $value){
            $bilder->where('categories.status', '=', $value);
        });
    }

    public static function rules($id = null){
        return [
            'name' => [
                "required",
                "string",
                "min:3",
                "max:255",
                Rule::unique('categories', 'name')->ignore($id),
                'filter:laravel,php,html'
            ],
            'parent_id' => ['nullable', 'int', 'exists:categories,id'],
            'category_image' => ['image', 'max:1048576', 'dimensions:min_width=100,min_height=100'],
            'status' =>  ['required' ,'in:Active,Archived']
        ];
    }
}
