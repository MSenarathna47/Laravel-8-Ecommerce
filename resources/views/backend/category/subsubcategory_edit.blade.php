@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">               
                <div class="row">
        
      <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h2 class="card m-3">Edit Sub SubCategory</h2>
               
                <form action="{{ route('subsubcategory.update') }}" method="post" >
                    @csrf


                    <input type="hidden" name="id" value="{{$subsubcategory->id}}">

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="example-text-input" > Category Name</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="category_id" required="">
                                    <option selected="" disabled="" value="">Select Category</option>
                                    @foreach ($categories as $category )
                                    <option value="{{$category->id}}" {{$category->id == $subsubcategory->category_id ? 'selected' : ''}}  >{{$category->category_name}}</option>
                                    @endforeach                                
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                               @enderror

                            </div>
                        </div>
                    </div>   
                    

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="example-text-input" > SubCategory Name</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="subcategory_id" required="">
                                    <option selected="" disabled="" value="">Select Sub Category</option>
                                    @foreach ($subcategories as $category )
        <option value="{{$category->id}}" {{$category->id == $subsubcategory->subcategory_id ? 'selected' : ''}}>{{$category->subcategory_name}}</option>
                                    @endforeach                                
                                </select>
                                @error('subcategory_id')
                                <span class="text-danger">{{$message}}</span>
                               @enderror

                            </div>
                        </div>
                    </div>   
                    
                    


                    
                    <div class="form-group">
                        <label for="example-text-input" > Sub SubCategory Name</label>
                        <div class="col-sm-10">
                            <input class="form-control"  id="subsubcategory_name" name="subsubcategory_name" type="text"  value="{{$subsubcategory->subsubcategory_name}}">
                            @error('subsubcategory_name')
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