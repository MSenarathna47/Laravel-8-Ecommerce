@extends('admin.admin_master')
@section('admin')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}

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
                                            <th>Image </th>
                                            <th>Product Name</th>
                                            <th>Product Price </th>
                                            <th>Quantity </th>
                                            <th>Discount </th>
                                            <th>Status </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($products as $item )
                                        <tr>
                                            <td><img src="{{ asset($item->product_thambnail) }}" style="width: 60px; height: 50px;"> </td>
                                            <td>{{ $item->product_name}}</td>
                                            <td>{{ $item->selling_price}} $</td>
                                            <td>{{ $item->product_qty}}</td>

                                            <td>
                                                @if($item->discount_price == NULL)
                                                <div class="font-size-20">
                                                    <span class="badge bg-warning">No Discount</span>
                                                </div>
                                                @else
                                                @php
                                                $amount = $item->selling_price - $item->discount_price;
                                                $discount = ($amount/$item->selling_price) * 100;
                                                @endphp
                                                <div class="font-size-20">

                                                 <span class="badge bg-warning">{{ round($discount)  }} %</span>
                                                </div>

                                                @endif
                                            </td>
                                            <td>
                                                @if($item->status  == 1)
                                                <div class="font-size-20">
                                                 <span class="badge bg-success">Active</span>
                                                </div>
                                                @else
                                                <div class="font-size-20">
                                                    <span class="badge bg-danger">inActive</span>
                                                </div>
                                                @endif
                                            </td>


                                            <td width="20%">
                                                <a href="" class="btn btn-primary" title="View"><i class="fa fa-eye"></i></a>
                                                <a href="{{route('product.edit',$item->id)}}" class="btn btn-info" title="Edit" ><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger" title="Delete" id="delete"><i class="fa fa-trash"></i></a>
                                                @if($item->status == 1)
                                                 <a href="{{ route('product.inactive',$item->id) }}" id="Inactive" class="btn btn-danger" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
                                                @else
                                                 <a href="{{ route('product.active',$item->id) }}" id="Active" class="btn btn-success" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
                                                @endif
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

