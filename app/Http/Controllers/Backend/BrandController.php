<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;





use Symfony\Contracts\Service\Attribute\SubscribedService;

class BrandController extends Controller
{
    public function BrandView()
    {
         $brands = Brand::latest()->get();
         return view('backend.brand.brand_view' , compact('brands'));
    }//end methode

    public function BrandStore(Request $request)
    {


        $request->validate([
            'brand_name' => 'required',
            'brand_image' => 'required',
        ],[
            'brand_image.required' => 'Input Brand Image',
            'brand_name.required' => 'Input Brand Name',

        ]);


        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).".".$image->getClientOriginalExtension();
        Image::make($image)->resize(300,200)->save('upload/brand/'.$name_gen); //resize image using laravel intervation libray
        $save_url = 'upload/brand/'.$name_gen;

        Brand::insert([
            'brand_name'=> $request->brand_name,
            'brand_slug'=>strtolower(str_replace(' ' , '-' , $request->brand_name )),
            'brand_image' => $save_url,
        ]);

        $notification =  array (
            'message' => 'Brand Insert Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }//end methode


    public function BrandEdit($id)
    {
        $brand = Brand::findorFail($id); //get specific id gata using findorfail function
        return view('backend.brand.brand_edit' , compact('brand'));


    }//end methode


    public function BrandUpdate(Request $request)
    {
        $brand_id = $request->id;
        $old_img = $request->oldimage;

        if($request->file('brand_image'))
        {


            unlink($old_img);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).".".$image->getClientOriginalExtension();
            Image::make($image)->resize(300,200)->save('upload/brand/'.$name_gen); //resize image using laravel intervation libray
            $save_url = 'upload/brand/'.$name_gen;

            Brand::findOrFail($brand_id)->update([
                'brand_name'=> $request->brand_name,
                'brand_slug'=>strtolower(str_replace(' ' , '-' , $request->brand_name )),
                'brand_image' => $save_url,
            ]);


            $notification =  array (

                'message' => 'Brand Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.brand')->with($notification);

        }else{

            Brand::findOrFail($brand_id)->update([
                'brand_name'=> $request->brand_name,
                'brand_slug'=>strtolower(str_replace(' ' , '-' , $request->brand_name )),
            ]);


            $notification =  array (

                'message' => 'Brand Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.brand')->with($notification);
        }
    }//end methode

    public function BrandDelete($id)
    {
        $brand = Brand::findOrFail($id);
        $img = $brand->brand_image;
        unlink($img);

        Brand::findOrFail($id)->delete();

        $notification =  array (

            'message' => 'Brand Delected Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    } //end methode

}
