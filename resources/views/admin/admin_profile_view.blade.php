@extends('admin.admin_master')
@section('admin')

<div class="page-content">
   <div class="container-fluid">
       
       <!-- start page title -->
     
        <div class="row ">
            <div class="col-lg-8 ">
                <div class="card ">
                    <center>
                        <img class="rounded-circle avatar-xl mt-4" src="{{ (!empty($adminData->profile_photo_path)) ?
                         url('upload/admin_images/'.$adminData->profile_photo_path):url('upload/No_Image_Available.jpg')}}" alt="Card image cap">
                    </center>
                    <div class="card-body">
                        <hr>
                        <h4 class="card-title">Name : {{$adminData->name}} </h4>
                        <hr>
                        <h4 class="card-title">User Email : {{$adminData->email}} </h4>
                        <hr>
                        <a class="btn btn-primary waves-effect waves-light" href="{{ route('admin.profile.edit')}}">Edit Profile</a>

                        
                    </div>
                </div>
            </div>

   

        </div>
       </div>
      
   </div>
   
</div>

@endsection