 @extends('frontend.main_master')
@section('content')

{{-- @php
    $user = DB::table('users')->where('id' , Auth::user()->id)->first();
@endphp --}}

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <br><br>
                <img src="{{ (!empty($user->profile_photo_path)) ?
                    url('upload/user_images/'.$user->profile_photo_path):url('upload/No_Image_Available.jpg')}} " height="100%" width="100%"  class="card-img-top" style="border-radius: 50% " alt="">
                    <ul class="list-group list-group-flush m-4">
                        <br>
                        <a href="{{route('dashboard')}}" class="btb btn-primary btn-sm btn-block">Home</a>
                        <a href="{{route('user.profile')}}" class="btb btn-primary btn-sm btn-block">Profile Update</a>
                        <a href="{{route('change.password')}}" class="btb btn-primary btn-sm btn-block">Change Password</a>
                        <a href="{{route('user.logout')}}" class="btb btn-danger btn-sm btn-block">Logout</a>

                    </ul>
            </div>  <!-- // end col md 2 -->
            
            
            <div class="col-md-2">

            </div>  <!-- // end col md 2 -->        

            <div class="col-md-6">
                <div class="card">
                    <div class="text-center">
                      <h3><span class="text-danger">Change Password</span></h3>                
                    </div>
                    <div class="card-body">
                        <form action="{{route('user.password.update')}}" method="post" enctype="multipart/form-data">
                            @csrf                    
                            
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Current Password <span></span></label>
                                <input id="current_password" type="password"  name="oldpassword" class="form-control unicase-form-control text-input"   >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">New Password <span></span></label>
                                <input  id="password" type="password" name="password" class="form-control unicase-form-control text-input"   >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password <span></span></label>
                                <input  id="password_confirmation" type="password" name="password_confirmation" class="form-control unicase-form-control text-input" >
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  <!-- // end col md 2 -->    
    

        </div> <!-- // end row  -->    
    </div>
</div>

@endsection