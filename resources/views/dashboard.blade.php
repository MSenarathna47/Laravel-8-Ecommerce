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
                        Welcome To Easy Online Shop</h3>  
                    </div>
                </div>
            </div>  <!-- // end col md 2 -->    
    

        </div> <!-- // end row  -->    
    </div>
</div>

@endsection