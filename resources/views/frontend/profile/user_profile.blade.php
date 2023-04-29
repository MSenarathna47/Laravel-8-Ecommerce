@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <br><br>
                <img src="{{ (!empty($user->profile_photo_path)) ?
                    url('upload/user_images/'.$user->profile_photo_path):url('upload/No_Image_Available.jpg')}} " height="100%" width="100%"  class="card-img-top" style="border-radius: 50% " alt="">
                    <ul class="list-group list-group-flush m-4">
                        <br>
                        <a href="" class="btb btn-primary btn-sm btn-block">Home</a>
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
                      <h3><span class="text-danger"> Hi...</span><strong>{{ Auth::user()->name}}</strong>
                        Update Your Profile</h3>                
                    </div>
                    <div class="card-body">
                        <form action="{{route('user.profile.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name <span></span></label>
                                <input  type="text" name="name" class="form-control unicase-form-control text-input"  value="{{$user->name}}" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email <span></span></label>
                                <input  type="email" name="email" class="form-control unicase-form-control text-input"   value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone <span></span></label>
                                <input  type="text" name="phone" class="form-control unicase-form-control text-input"   value="{{$user->phone}}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">User Image <span></span></label>
                                <input type="file" class="form-control" name="profile_photo_path" id="image">
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