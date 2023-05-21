@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">

      {{------------------------------ Add Brand Page ---------------------------}}


      <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h2 class="card m-3">Edit Slider</h2>

                <form method="post" action="{{ route('slider.update') }}" enctype="multipart/form-data">
                    @csrf
                <input type="hidden" name="id" value="{{ $sliders->id }}">
                <input type="hidden" name="old_image" value="{{ $sliders->slider_img }}">

                    <div class="form-group">
                        <label for="example-text-input" >Brand Name</label>
                        <div class="col-sm-10">
                            <input type="text"  name="title" class="form-control" value="{{ $sliders->title }}" >
                            @error('brand_name')
                                <span class="title-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="example-text-input" >Slider Decription </label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control" value="{{ $sliders->description }}" >
                            @error('description')
                                <span class="title-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="example-text-input" >Slider Image</label>
                        <div class="col-sm-10">
                            <input type="file" name="slider_img" class="form-control" >
     @error('slider_img')
	 <span class="text-danger">{{ $message }}</span>
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
