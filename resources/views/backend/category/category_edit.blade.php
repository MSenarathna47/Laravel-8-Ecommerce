@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">               
                <div class="row">
                    

      {{------------------------------ Add Brand Page ---------------------------}}


      <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h2 class="card m-3">Add Category</h2>
               
                <form action="{{ route('category.update') }}" method="post" >
                    @csrf

                    <input type="hidden" name="id" value="{{$category->id}}">
                    <input type="hidden" name="oldimage" value="{{$category->category_icon}}">

                    <div class="form-group">
                        <label for="example-text-input" >Category Name</label>
                        <div class="col-sm-10">
                            <input class="form-control"  id="category_name" name="category_name" type="text" value="{{$category->category_name}}">
                            @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>     
                    <div class="form-group">
                        <label for="example-text-input" >Category Icon</label>
                        <div class="col-sm-10">
                            <input class="form-control"  id="category_icon" name="category_icon" type="text"  value="{{$category->category_icon}}">
                            @error('category_icon')
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