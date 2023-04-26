@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<div class="page-content">
   <div class="container-fluid">
       
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Edit Profile Page</h4>
                    <br>

                    <form action="{{ route('admin.profile.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Admin User Name</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text"  id="name" name="name" value="{{$editData->name}}">
                        </div>
                    </div>
                    <!-- end row -->
                    <div class="row mb-3">
                        <label for="example-search-input" class="col-sm-2 col-form-label"> Admin Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email "  id="email" name="email" value="{{$editData->email}}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-search-input" class="col-sm-2 col-form-label">Profile Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="profile_photo_path" id="image">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="example-search-input" class="col-sm-2 col-form-label"> </label>

                        <div class="col-sm-10">
                            <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($editData->profile_photo_path)) ?
                                url('upload/admin_images/'.$editData->profile_photo_path):url('upload/No_Image_Available.jpg')}}" alt="Card image cap">
                       
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

<script type="text/javascript">
    $(document).ready(function(){

        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);

            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection