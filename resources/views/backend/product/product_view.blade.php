@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h2 class="card m-3">Product List</h2>



                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($products as $item )
                                        <tr>
                                            <td><img src="{{ asset($item->product_thambnail) }}" style="width: 60px; height: 50px;"> </td>
                                            <td>{{ $item->product_name}}</td>
                                            <td>{{ $item->product_qty}}</td>
                                            <td>
                                                <a href="{{route('product.edit',$item->id)}}" class="btn btn-info" >Edit</a>
                                                {{-- <a href="{{route('category.delete',$item->id)}}" class="btn btn-danger" id="delete">Delete</a> --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->




@endsection
