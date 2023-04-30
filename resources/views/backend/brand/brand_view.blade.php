@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">               
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">

                                <h2 class="card m-3">Brand List</h2>
                                
                               

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Brand Name</th>
                                            <th>Image</th>
                                            <th>Action</th>                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($brands as $item )
                                        <tr>
                                            <td>{{$item->brand_name}}</td>
                                            <td>
                                                <img src="{{ asset($item->brand_image) }}" style="width:70px; height:40px;">
                                            </td>
                                            <td>
                                                <a href="{{route('brand.edit',$item->id)}}" class="btn btn-info" >Edit</a>
                                                <a href="{{route('brand.delete',$item->id)}}" class="btn btn-danger" id="delete">Delete</a> 
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

                <h2 class="card m-3">Add Brand</h2>
               
                <form action="{{ route('brand.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="example-text-input" >Brand Name</label>
                        <div class="col-sm-10">
                            <input class="form-control"  id="brand_name" name="brand_name" type="text">
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