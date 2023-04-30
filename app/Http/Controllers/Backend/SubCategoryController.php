<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function SubCategoryView()
    {
        $categories = Category::orderBy('category_name' , 'ASC')->get();
        $subcategory = SubCategory::latest()->get();
        return view('backend.category.subcategory_view' , compact('subcategory','categories'));
    }

    public function SubCategoryStore(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ],[
            'category_id.required' => 'Select Category ',
            'subcategory_name.required' => 'Input Category name',

        ]);

        SubCategory::insert([
            'category_id'=> $request->category_id,
            'subcategory_name'=> $request->subcategory_name,
            'subcategory_slug'=>strtolower(str_replace(' ' , '-' , $request->subcategory_name )),
      

        ]);

        $notification =  array (
            'message' => 'SubCategory Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name' , 'ASC')->get();
        $subcategory = SubCategory::findorFail($id); //get specific id gata using findorfail function
        return view('backend.category.subcategory_edit' , compact('subcategory' ,'categories' ));


    }//end methode
}
