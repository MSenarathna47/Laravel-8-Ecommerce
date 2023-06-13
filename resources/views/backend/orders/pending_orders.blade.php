@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h3 class="box-title">Pending Orders List</h3>



                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Date </th>
                                            <th>Invoice </th>
                                            <th>Amount </th>
                                            <th>Payment </th>
                                            <th>Status </th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($orders as $item)
                                        <tr>
                                           <td> {{ $item->order_date }}  </td>
                                           <td> {{ $item->invoice_no }}  </td>
                                           <td> ${{ $item->amount }}  </td>

                                           <td> {{ $item->payment_method }}  </td>

                                           <td class="font-size-20">
                                             <span class="badge bg-primary"> {{ $item->status }} </span>
                                           </td>
                                           <td width="25%">
                                    <a href="{{ route('pending.order.details',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-eye"></i> </a>

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























































