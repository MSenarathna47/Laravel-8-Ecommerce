
@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                         <h4 class="card-title">Product Update</h4>
                         <br>
                         <form class="custom-validation" action="{{route('product-update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$products->id}}">
                            <div class="row">
                                <div class="col-md 6">
                                    <label for="example-text-input" >Brand Select</label>
                                    <div class="col-sm-10">

                                        <select class="form-select" name="brand_id" required="">
                                        <option selected="" disabled="" value="">Select Brand</option>
                                        @foreach ($brands  as $brand )
                                        <option value="{{$brand->id}}"
                                            {{$brand->id ==$products->brand_id ? 'selected': ' '}} >{{$brand->brand_name}}</option>
                                        @endforeach
                                        </select>
                                        @error('brand_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror

                                    </div>  <!--col-sm-10 end -->
                                </div> <!--col-md 6 end-->
                                <div class="col-md 6">
                                    <label for="example-text-input">Category Select</label>
                                    <div class="col-sm-10">

                                        <select class="form-select" name="category_id" required="">
                                        <option selected="" disabled="" value="">Select Category</option>
                                        @foreach ($categories as $category )
                                        <option value="{{$category->id}}"  {{$category->id == $products->category_id ? 'selected': ' '}}>{{$category->category_name}}</option>
                                        @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                         @enderror

                                    </div> <!--col-sm-10 end -->
                                </div> <!--col-md 6 end-->

                            </div> <!--row end -->

                            <div class="row">
                                <div class="col-md 6 mt-4">
                                    <label for="example-text-input" >SubCategory Select</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="subcategory_id" required="">
                                        <option selected="" disabled="" value="">Select SubCategory</option>
                                        @foreach ($subcategory as $subcategory )
                                        <option value="{{$subcategory->id}}"  {{$subcategory->id == $products->subcategory_id ? 'selected': ' '}}>{{$subcategory->subcategory_name}}</option>
                                        @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="text-danger">{{$message}}</span>
                                         @enderror
                                    </div>
                                </div> <!--col-md 6 end-->
                                <div class="col-md 6 mt-4">
                                    <label for="example-text-input" >Sub SubCategory Select</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="subsubcategory_id" required="">
                                        <option selected="" disabled="" value="">Select Sub SubCategory</option>
                                        @foreach ($subsubcategory as $subsub )
                                        <option value="{{$subsub->id}}"  {{$subsub->id == $products->subsubcategory_id ? 'selected': ' '}}>{{$subsub->subsubcategory_name}}</option>
                                        @endforeach
                                        </select>
                                        @error('subsubcategory_id')
                                        <span class="text-danger">{{$message}}</span>
                                         @enderror
                                    </div>
                                </div> <!--col-md 6 end-->
                            </div> <!--row end -->

                            <div class="row">
                                <div class="col-md 6 mt-4">
                                    <label>Product Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" required="" name="product_name" value="{{$products->product_name}}">
                                    </div>
                                    @error('product_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> <!--col-md 6 end-->
                                <div class="col-md 6  mt-4">
                                    <label>Product Code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" required="" name="product_code" value="{{$products->product_code}}" >
                                    </div>
                                    @error('product_code')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> <!--col-md 6 end-->
                            </div> <!--row end -->

                            <div class="row">
                                <div class="col-md 6  mt-4">
                                    <label>Product Quantity</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="product_qty"  class="form-control"  value="{{$products->product_qty}}">
                                    </div>
                                    @error('product_qty')
                                    <span class="text-danger">{{$message}}</span>
                                     @enderror
                                </div> <!--col-md 6 end-->
                                <div class="col-md 6  mt-4">
                                    <label>Product Tags</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_tags" value="{{$products->product_tags}}" data-role="tagsinput" placeholder="add tags" style="display: none;">
                                    </div>
                                    @error('product_tags')
                                    <span class="text-danger">{{$message}}</span>
                                     @enderror
                                </div> <!--col-md 6 end-->
                            </div> <!--row end -->

                            <div class="row">
                                <div class="col-md 6  mt-4">
                                    <label>Product Size</label>
                                    <div  class="col-sm-10">
                                        <input type="text" class="form-control" name="product_size" value="{{$products->product_size}}" data-role="tagsinput" placeholder="add size" style="display: none;">
                                    </div>
                                    @error('product_size')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> <!--col-md 6 end-->
                                <div class="col-md 6  mt-4">
                                    <label>Product Tags</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_color" value="{{$products->product_color}}" data-role="tagsinput" placeholder="add color" style="display: none;">
                                    </div>
                                    @error('product_color')
                                    <span class="text-danger">{{$message}}</span>
                                     @enderror
                                </div> <!--col-md 6 end-->
                            </div> <!--row end -->


                            <div class="row">
                                <div class="col-md 6  mt-4">
                                    <label>Product Selling Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" required="" name="selling_price" value="{{$products->selling_price}}" >
                                    </div>
                                    @error('selling_price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> <!--col-md 6 end-->
                                <div class="col-md 6  mt-4">
                                    <label>Product Discount Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="discount_price"  value="{{$products->discount_price}}">
                                    </div>
                                    @error('discount_price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div> <!--col-md 6 end-->
                            </div> <!--row end -->




                            <div class="row">
                                <div class="col-md 12  mt-4">
                                    <label>Short Description</label>
                                    <div  class="col-sm-11">
                                        <textarea required="" name="short_descp" class="form-control" rows="2">{!!$products->short_descp!!}</textarea>
                                        @error('short_descp')
                                        <span class="text-danger">{{$message}}</span>
                                         @enderror
                                    </div>
                                </div> <!--col-md 12 end-->

                            </div> <!--row end -->

                            <div class="row">
                                <div class="col-md 12  mt-4">
                                    <label>Long Description</label>
                                    <div  class="col-sm-11">
                                        <textarea id="editor1" name="long_descp" rows="10" cols="80">{!!$products->long_descp!!}</textarea>
                                        @error('long_descp')
                                        <span class="text-danger">{{$message}}</span>
                                         @enderror
                                    </div>
                                </div> <!--col-md 12 end-->
                            </div> <!--row end -->
                            <hr>
                            <div class="row">
                                <div class="col-md 6  mt-4">
                                    <div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{$products->hot_deals == 1 ? 'checked' : ' '}}>
											<label for="checkbox_2">Hot Deals  </label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_3" name="featured" value="1" {{$products->featured == 1 ? 'checked' : ' '}}>
											<label for="checkbox_3">Featured</label>
										</fieldset>
									    <div class="help-block">

                                        </div>
                                    </div>
                                </div> <!--col-md 6 end-->

                                <div class="col-md 6  mt-4">
                                    <div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_3" name="special_offer" value="1" {{$products->special_offer == 1 ? 'checked' : ' '}}>
											<label for="checkbox_3">Special Offer</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_4" name="special_deals" value="1" {{$products->special_deals == 1 ? 'checked' : ' '}}>
											<label for="checkbox_4">Special Deals</label>
										</fieldset>
									    <div class="help-block">
                                        </div>
                                    </div>
                                </div> <!--col-md 6 end-->
                            </div> <!--row end -->

                            <div class="row">
                                <div class="col-md 5 mt-4">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                        Update
                                    </button>
                                </div>
                            </div>
                         </form>
                    </div> <!--card-body end-->
                </div> <!--card end-->
            </div> <!-- col-xl-12 end-->
        </div> <!-- row end-->
    </div> <!-- container-fluid end-->


    {{-- ///////////////// Multiple image  update area ////////////////// --}}

    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <h5 class="card-header">Product Multiple Image <strong>Update</strong></h5>
                    <div class="card-body">
                       <form action="{{route('update-product-image')}}" enctype="multipart/form-data" method="post">
                        @csrf
                            <div class="row row-sm">

                               @foreach ( $multiImgs as $img)
                               <div class="col-md-3 m-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{asset($img->photo_name)}}" class="card-img-top" style="height:130px; width:280px;">
                                    <div class="card-body">
                                      <h5 class="card-title">
                                        <a href="{{route('product-multiimage-delete',$img->id)}}" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
                                      </h5>
                                      <p class="card-text">
                                        <div class="form-group">
                                            <label for="" class="form-control-lable"> Change Image <span class="tx-danger">*</span></label>
                                            <input type="file" name="multi_img[{{ $img->id }}]" class="form-control">
                                        </div>
                                      </p>
                                    </div>
                                  </div>
                               </div>
                               @endforeach
                            </div>
                            <div class="row">
                                <div class="col-md 5 mt-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                        Update Image
                                    </button>
                                </div>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>

    {{-- ///////////////// Thumble image  update area ////////////////// --}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <h5 class="card-header">Product Thumbnail Image <strong>Update</strong></h5>
                    <div class="card-body">
                       <form action="{{route('update-product-thumbnail')}}" enctype="multipart/form-data" method="post">
                        @csrf
                            <div class="row row-sm">

                                <input type="hidden" name="id" value="{{ $products->id}}">
                                <input type="hidden" name="oldimage" value="{{ $products->product_thambnail}}">


                               <div class="col-md-3 m-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{asset($products->product_thambnail)}}" class="card-img-top" style="height:130px; width:280px;">
                                    <div class="card-body">
                                      <h5 class="card-title">
                                        <a href="" class="btn btn-sm btn-danger" id="delete" title="Delete Data"><i class="fa fa-trash"></i></a>
                                      </h5>
                                      <p class="card-text">
                                        <div class="form-group">
                                            <label for="" class="form-control-lable"> Change Image <span class="tx-danger">*</span></label>
                                            <input type="file" class="form-control" onChange="mainThamUrl(this)" required="" name="product_thambnail" id="product_thambnail">
                                             <img class="m-2" src="" id="mainThmb">

                                        </div>
                                      </p>
                                    </div>
                                  </div>
                               </div>

                            </div>
                            <div class="row">
                                <div class="col-md 5 mt-2">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                        Update Image
                                    </button>
                                </div>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </section>



</div> <!--page-content end-->
<!-- -->


<!----------------------------------------Ajax for selecion box------------------------------------------->

<script type="text/javascript">

// -----------------------------------------Load Sub category---------------------------------------------

  $(document).ready(function() {
      $('select[name="category_id"]').on('change', function(){
          var category_id = $(this).val();
          if(category_id) {
              $.ajax({
                  url: "{{  url('/Category/subcategory/ajax') }}/"+category_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                    $('select[name="subsubcategory_id"]').html('');
                     var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });


// -----------------------------------------Load  Sub Sub category---------------------------------------------


      $('select[name="subcategory_id"]').on('change', function(){
          var subcategory_id = $(this).val();
          if(subcategory_id) {
              $.ajax({
                  url: "{{  url('/Category/subsubcategory/ajax') }}/"+subcategory_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="subsubcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });

  });
</script>


<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>


<script>

  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data

          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img class ="m-1"/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });

      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });

  </script>


@endsection
