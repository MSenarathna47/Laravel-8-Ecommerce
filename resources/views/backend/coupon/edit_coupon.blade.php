@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">

      {{------------------------------ edit coupons Page ---------------------------}}


      <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h2 class="card m-3">Edit coupons</h2>

                <form method="post" action="{{ route('coupon.update',$coupons->id) }}" >                    @csrf
                 <input type="hidden" name="id" value="{{ $coupons->id }}">



	 <div class="form-group">
		<h5>Coupon Name  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text"  name="coupon_name" class="form-control" value="{{ $coupons->coupon_name }}">
	 @error('coupon_name')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	</div>
	</div>

    <div class="form-group">
		<h5>Coupon Discount(%) <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="text" name="coupon_discount" class="form-control" value="{{ $coupons->coupon_discount }}">
     @error('coupon_discount')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
	</div>


	<div class="form-group">
		<h5>Coupon Validity Date  <span class="text-danger">*</span></h5>
		<div class="controls">
	 <input type="date" name="coupon_validity" class="form-control" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" value="{{ $coupons->coupon_validity }}">
     @error('coupon_validity')
	 <span class="text-danger">{{ $message }}</span>
	 @enderror
	  </div>
	</div>



    <div class="text-xs-right">
        <br>
        <input type="submit" class="btn btn-primary btn-primary mb-5" value="Update">
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
