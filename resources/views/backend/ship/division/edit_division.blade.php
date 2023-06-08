@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">

      {{------------------------------ edit Division Page ---------------------------}}


      <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h3 class="box-title">Edit Division </h3>

                <form method="post" action="{{ route('division.update',$divisions->id) }}" >
                    @csrf


                <div class="form-group">
                   <h5>Division Name  <span class="text-danger">*</span></h5>
                   <div class="controls">
                <input type="text"  name="division_name" class="form-control" value="{{ $divisions->division_name }}" >
                @error('division_name')
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





























