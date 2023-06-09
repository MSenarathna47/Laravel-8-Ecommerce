@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">



<!--   ------------ Add State Page -------- -->



      <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h3 class="box-title">Edit State </h3>



                <form method="post" action="{{ route('state.update',$state->id) }}" >
                    @csrf



           <div class="form-group">
               <h5>Division Select <span class="text-danger">*</span></h5>
               <div class="controls">
                   <select name="division_id" class="form-control"  >
                       <option value="" selected="" disabled="">Select Division</option>
                       @foreach($division as $div)
                       <option value="{{ $div->id }}" {{ $div->id == $state->division_id ? 'selected': '' }}>{{ $div->division_name }}</option>
                       @endforeach
                   </select>
                   @error('division_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                    </div>



           <div class="form-group">
               <h5>District Select <span class="text-danger">*</span></h5>
               <div class="controls">
                   <select name="district_id" class="form-control"  >
                       <option value="" selected="" disabled="">Select District</option>
                       @foreach($district as $dis)
                       <option value="{{ $dis->id }}" {{ $dis->id == $state->district_id ? 'selected': '' }}>{{ $dis->district_name }}</option>
                       @endforeach
                   </select>
                   @error('district_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                    </div>



                <div class="form-group">
                   <h5>State Name  <span class="text-danger">*</span></h5>
                   <div class="controls">
                <input type="text"  name="state_name" class="form-control" value="{{ $state->state_name }}">
                @error('state_name	')
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





















