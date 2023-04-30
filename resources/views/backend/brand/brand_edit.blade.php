@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">               
                <div class="row">
       
      {{------------------------------ Add Brand Page ---------------------------}}


      <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h2 class="card m-3">Edit Brand</h2>
               
                <form action="{{ route('brand.update',$brand->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{$brand->id}}">
                    <input type="hidden" name="oldimage" value="{{$brand->brand_image}}">

                    <div class="form-group">
                        <label for="example-text-input" >Brand Name</label>
                        <div class="col-sm-10">
                            <input class="form-control"  id="brand_name" name="brand_name" type="text" value="{{$brand->brand_name}}">
                            @error('brand_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>     
                    {{-- <div class="form-group">
                        <label for="example-text-input" >Current Password</label>
                        <div class="col-sm-10">
                            <input class="form-control"  id="" name="" type="">
                        </div>
                    </div>         --}}
                    <div class="form-group">
                        <label for="example-text-input" >Brand Image</label>
                        <div class="col-sm-10">
                            <input class="form-control"  id="brand_image" name="brand_image" type="file">
                            @error('brand_image')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>   
                    <br>

                    <input type="submit" class="btn btn-primary waves-effect waves-light" value="Update">
                   

                </form>
              

            </div>
        </div>
    </div> <!-- end col -->


                </div> <!-- end row -->      
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        



@endsection