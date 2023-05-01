<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast;

class CategoryController extends Controller
{
    public function CategoryView()
    {
        $category = Category::latest()->get();
         return view('backend.category.category_view' , compact('category'));
    }

    public function CategoryStore(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name.required' => 'Input Category Name',
            'category_icon.required' => 'Input Icon',

        ]);

        Category::insert([
            'category_name'=> $request->category_name,
            'category_slug'=>strtolower(str_replace(' ' , '-' , $request->category_name )),
            'category_icon'=> $request->category_icon,

        ]);

        $notification =  array (
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function CategoryEdit($id)
    {
        $category = Category::findorFail($id); //get specific id gata using findorfail function
        return view('backend.category.category_edit' , compact('category'));


    }//end methode

    public function CategoryUpdate(Request $request)
    {
        $category_id = $request->id;   
          
        Category::findOrFail($category_id)->update([
            'category_name'=> $request->category_name,
            'category_slug'=>strtolower(str_replace(' ' , '-' , $request->category_name )),
            'category_icon'=> $request->category_icon,
        ]);

            
        $notification =  array (

            'message' => 'Category Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('all.category')->with($notification);


    }//end method

    public function CategoryDelete($id)
    {      
        Category::findOrFail($id)->delete();
        $notification =  array (
            'message' => 'Category Delected Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
