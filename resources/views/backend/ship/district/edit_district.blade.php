@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">

<!--   ------------ Add District Page -------- -->


      <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h3 class="box-title">Edit District </h3>



            <form method="post" action="{{ route('district.update',$district->id ) }}" >
                @csrf



            <div class="form-group">
            <h5>Division Select <span class="text-danger">*</span></h5>
            <div class="controls">
            <select name="division_id" class="form-control"  >
                <option value="" selected="" disabled="">Select Division</option>
                @foreach($division as $div)
                <option value="{{ $div->id }}" {{ $div->id == $district->division_id ? 'selected': '' }} >{{ $div->division_name }}</option>
                @endforeach
            </select>
            @error('division_id')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
                </div>



            <div class="form-group">
            <h5>District Name  <span class="text-danger">*</span></h5>
            <div class="controls">
            <input type="text"  name="district_name" class="form-control" value="{{ $district->district_name }}" >
            @error('district_name')
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




