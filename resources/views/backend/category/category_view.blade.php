@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">               
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">

                                <h2 class="card m-3">Category List</h2>
                                
                               

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Categoty Icon</th>
                                            <th>Category Name</th>               
                                            <th>Action</th>                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($category as $item )
                                        <tr>
                                            <td><span><i class="{{$item->category_icon}}"></i></span></td>
                                            <td>{{$item->category_name}}</td>                           
                                            <td>
                                                <a href="{{route('category.edit',$item->id)}}" class="btn btn-info" >Edit</a>
                                                <a href="{{route('category.delete',$item->id)}}" class="btn btn-danger" id="delete">Delete</a> 
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

                <h2 class="card m-3">Add Category</h2>
               
                <form action="{{ route('category.store') }}" method="post" >
                    @csrf

                    <div class="form-group">
                        <label for="example-text-input" >Category Name</label>
                        <div class="col-sm-10">
                            <input class="form-control"  id="category_name" name="category_name" type="text">
                            @error('category_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>     
                    <div class="form-group">
                        <label for="example-text-input" >Category Icon</label>
                        <div class="col-sm-10">
                            <input class="form-control"  id="category_icon" name="category_icon" type="text">
                            @error('category_icon')
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