@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">               
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">

                                <h2 class="card m-3">SubCategory List</h2>
                                
                               

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Categoty</th>
                                            <th>SubCategory Name</th>               
                                            <th>Action</th>                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($subcategory as $item )
                                        <tr>
                                            <td>{{$item['category'] ['category_name']}}</td>     
                                            <td>{{$item->subcategory_name}}</td>                           
                                            <td>
                                                <a href="{{route('subcategory.edit',$item->id)}}" class="btn btn-info" >Edit</a>
                                                <a href="{{route('subcategory.delete',$item->id)}}" class="btn btn-danger" id="delete">Delete</a> 
                                            </td>                                                                               
                                        </tr> 
                                        @endforeach                                                                  
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->

                    {{-- //<i class="fa-fa-trash"></i> --}}

      {{------------------------------ Add Brand Page ---------------------------}}


      <div class="col-4">
        <div class="card">
            <div class="card-body">

                <h2 class="card m-3">Add SubCategory</h2>
               
                <form action="{{ route('subcategory.store') }}" method="post" >
                    @csrf

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="example-text-input" >Category Name</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="category_id" required="">
                                    <option selected="" disabled="" value="">Select Category</option>
                                    @foreach ($categories as $category )
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach
                                    
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                                 @enderror




                                {{-- <div class="invalid-feedback">
                                    Please select a valid state.
                                </div> --}}
                            </div>

                        </div>

                    </div>   
                    
                    


                    
                    <div class="form-group">
                        <label for="example-text-input" >SubCategory Name</label>
                        <div class="col-sm-10">
                            <input class="form-control"  id="subcategory_name" name="subcategory_name" type="text">
                            @error('subcategory_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>   
                    <br>

                    <input type="submit" class="btn btn-primary waves-effect waves-light" value="Add New">
                   

                </form>
              

            </div>
        </div>
    </div> <!-- end col -->


                </div> <!-- end row -->      
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
        



@endsection