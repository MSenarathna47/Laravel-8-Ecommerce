<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;


class IndexController extends Controller
{
    public function index()
    {

        // cart::destroy();
                // $d = Cart::content();    dd($d);



        $products = Product::where('status',1)->orderBy('id','DESC')->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $featured  = Product::where('featured',1)->Where('status',1)->orderBy('id','DESC')->limit(6)->get();
    	$categories = Category::orderBy('category_name','ASC')->get();
        $hot_deals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','DESC')->limit(3)->get();

    	$special_offer = Product::where('status',1)->where('special_offer',1)->orderBy('id','DESC')->limit(6)->get();

    	$special_deals = Product::where('status',1)->where('special_deals',1)->orderBy('id','DESC')->limit(3)->get();

        $skip_category_0 = Category::skip(0)->first();
    	$skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

    	$skip_category_1 = Category::skip(1)->first();
    	$skip_product_1 = Product::where('status',1)->where('category_id',$skip_category_1->id)->orderBy('id','DESC')->get();

    	$skip_brand_1 = Brand::skip(1)->first();
    	$skip_brand_product_1 = Product::where('status',1)->where('brand_id',$skip_brand_1->id)->orderBy('id','DESC')->get();


    	// return $skip_category->id;
    	// die();


        return view('frontend.index',compact('categories','sliders','products','featured','hot_deals','special_offer','special_deals',
        'skip_category_0','skip_product_0','skip_category_1','skip_product_1','skip_brand_1','skip_brand_product_1'));
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


    public function ProductDetails($id)
    {
		$product = Product::findOrFail($id);
        $multiImag = MultiImg::where('product_id',$id)->get();

        $color = $product->product_color;
		$product_color = explode(',', $color);

		$size = $product->product_size;
		$product_size = explode(',', $size);

        $cat_id = $product->category_id;
		$relatedProduct = Product::where('category_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();

	 	return view('frontend.product.product_details',compact('product','multiImag','product_color','product_size',
        'relatedProduct'));

	}



	public function TagWiseProduct($tag){
		$products = Product::where('status',1)->where('product_tags',$tag)->orderBy('id','DESC')->paginate(3);
		$categories = Category::orderBy('category_name','ASC')->get();
		return view('frontend.tags.tags_view',compact('products','categories'));

	}

    // Subcategory wise data
	public function SubCatWiseProduct(Request $request, $subcat_id,$slug){
		$products = Product::where('status',1)->where('subcategory_id',$subcat_id)
        ->orderBy('id','DESC')->paginate(3);
		$categories = Category::orderBy('category_name','ASC')->get();
		return view('frontend.product.subcategory_view',compact('products','categories' ));

	}


    // Sub-Subcategory wise data
	public function SubSubCatWiseProduct($subsubcat_id,$slug){
		$products = Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->paginate(6);
		$categories = Category::orderBy('category_name','ASC')->get();
		return view('frontend.product.sub_subcategory_view',compact('products','categories'));

	}

     /// Product View With Ajax
	public function ProductViewAjax($id){


        // print_r($id);
		$product = Product::with('category','brand')->findOrFail($id);

		$color = $product->product_color;
		$product_color = explode(',', $color);

		$size = $product->product_size;
		$product_size = explode(',', $size);



		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,

		));

	} // end method
}
































