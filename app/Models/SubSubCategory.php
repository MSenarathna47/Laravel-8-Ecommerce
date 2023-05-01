<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_id',
        'subsubcategory_name',
        'subsubcategory_slug'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id' , 'id');    //make relationship to  get category name to the subcategory table 
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class,'subcategory_id' , 'id');    //make relationship to  get category name to the subcategory table 
    }

}
