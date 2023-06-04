<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::where('status',1)->orderBy('id','DESC')->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $featured  = Product::where('featured',1)->Where('status',1)->orderBy('id','DESC')->limit(6)->get();
    	$categories = Category::orderBy('category_name','ASC')->get();
        $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();

    	$special_offer = Product::where('special_offer',1)->orderBy('id','DESC')->limit(6)->get();

    	$special_deals = Product::where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();

        

        return view('frontend.index',compact('categories','sliders','products','featured','hot_deals','special_offer','special_deals'));
    }

    public function UserLogout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function UserProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;


        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;

        }
        $data->save();

        $notification =  array (

            'message' => 'User Profile Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with( $notification);
    }

    public function UserChangePassword()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.change_password', compact('user'));
    }

    public function UserUpdateChangePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password'  => 'required|confirmed',
        ]);

        $hashedPassowrd = User::find(1)->password;
        if(Hash::check($request->oldpassword,$hashedPassowrd)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            return redirect()->route('user.logout');
        }
        else{
            return redirect()->back();
        }


    }

    // public function ProductDetails(Request $req,$id){
    //     $product = Product::findOrFail($id);
    //     $ProductSlug = $product->product_slug;
    //     dd($product->id,$ProductSlug);


    // }



    public function ProductDetails($id)
    {
		$product = Product::findOrFail($id);
        $multiImag = MultiImg::where('product_id',$id)->get();
	 	return view('frontend.product.product_details',compact('product','multiImag'));

	}
}
