@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">

                                <h3 class="box-title">Coupon List <span class="badge badge-pill badge-danger"> {{ count($coupons) }} </span></h3>



                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Coupon Name </th>
                                            <th>Coupon Discount</th>
                                            <th>Validity </th>
                                            <th>Status </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($coupons as $item)
                                        <tr>
                                           <td> {{ $item->coupon_name }}  </td>
                                           <td> {{ $item->coupon_discount }}% </td>
                                           <td width="25%">
                                          {{ Carbon\Carbon::parse($item->coupon_validity)->format('D, d F Y') }}
                                                </td>

                                           <td class="font-size-20">
                                                @if($item->coupon_validity >= Carbon\Carbon::now()->format('Y-m-d'))
                                                <span class="badge bg-success"> Valid </span>
                                                @else
                                              <span class="badge bg-danger"> Invalid </span>
                                                @endif

                                            </td>



                                            <td width="30%">
                                            <a href="{{ route('coupon.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data">
                                            <i class="fa fa-edit"></i> </a>

                                                <a href="{{ route('coupon.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
                                                <i class="fa fa-trash"></i></a>

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

                <h3 class="box-title">Add Coupon </h3>


                <form method="post" action="{{ route('coupon.store') }}" >
                    @csrf


                <div class="form-group">
                   <h5>Coupon Name  <span class="text-danger">*</span></h5>
                   <div class="controls">
                <input type="text"  name="coupon_name" class="form-control" >
                @error('coupon_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
               </div>
               </div>


               <div class="form-group">
                   <h5>Coupon Discount(%) <span class="text-danger">*</span></h5>
                   <div class="controls">
                <input type="text" name="coupon_discount" class="form-control" >
                @error('coupon_discount')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                 </div>
               </div>


               <div class="form-group">
                   <h5>Coupon Validity Date  <span class="text-danger">*</span></h5>
                   <div class="controls">
                <input type="date" name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                @error('coupon_validity')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                 </div>
               </div>


                <div class="text-xs-right">
                  <br>
                  <input type="submit" class="btn btn-primary btn-primary mb-5" value="Add New">
                </div>

                </form>

            </div>
        </div>
    </div> <!-- end col -->


                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->




@endsection
