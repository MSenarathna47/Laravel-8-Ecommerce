@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<div class="page-content">
   <div class="container-fluid">
       
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Admin Change Password</h4>
                    <br>

                    <form action="{{ route('update.change.password') }}" method="post" >
                    @csrf



                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Current Password</label>
                        <div class="col-sm-10">
                            <input class="form-control"  id="current_password" name="oldpassword" type="password">
                        </div>
                    </div>
                    <!-- end row -->


                    <div class="row mb-3">
                        <label for="example-search-input" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password"  id="password" name="password" >
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="example-search-input" class="col-sm-2 col-form-label"> Confirm Password</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" >
                        </div>
                    </div>
                   


                    <input type="submit" class="btn btn-primary waves-effect waves-light" value="Update Profile">
                   

                </form>
                    <!-- end row -->
                </div>
            </div>
        </div> <!-- end col -->
    </div>
      
   </div>
   
</div>
 


@endsection