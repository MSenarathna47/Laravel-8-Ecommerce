@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">

                                <h2 class="card m-3">Slider List</h2>



                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Slider Image </th>
                                            <th>Title</th>
                                            <th>Decription</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($sliders as $item)
                                        <tr>

                                      <td><img src="{{ asset($item->slider_img) }}" style="width: 70px; height: 40px;"> </td>
                                           <td>
                                               @if($item->title == NULL)
                                               <div class="font-size-20">
                                                     <span class="badge bg-danger">No Title</span>
                                               </div>
                                                @else
                                                {{ $item->title }}
                                                @endif
                                               </td>

                                           <td>{{ $item->description }}</td>
                                           <td >
                                                @if($item->status == 1)
                                                <div class="font-size-20">
                                                    <span class="badge bg-success">Active</span>
                                                </div>
                                                @else
                                                <div class="font-size-20">
                                                    <span class="badge bg-danger">inActive</span>
                                                </div>
                                                @endif

                                            </td>

                                           <td width="30%">
                                    <a href="{{ route('slider.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data"><i class="fa fa-edit"></i> </a>

                                    <a href="{{ route('slider.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
                                        <i class="fa fa-trash"></i></a>

                                   @if($item->status == 1)
                                    <a href="{{ route('slider.inactive',$item->id) }}" id="Inactive"  class="btn btn-danger btn-sm" title="Inactive Now"><i class="fa fa-arrow-down"></i> </a>
                                        @else
                                    <a href="{{ route('slider.active',$item->id) }}" id="Active"  class="btn btn-success btn-sm" title="Active Now"><i class="fa fa-arrow-up"></i> </a>
                                        @endif

                                           </td>

                                        </tr>
                                         @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->

                    {{-- //<i class="fa-fa-trash"></i> --}}

      {{------------------------------ Add Brand Page ---------------------------}}


      <div class="col-4">
        <div class="card">
            <div class="card-body">

                <h2 class="card m-3">Add Slider</h2>


 <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
    @csrf

                    <div class="form-group">
                        <label for="example-text-input" >Slider Title</label>
                        <div class="col-sm-10">
                            <input class="form-control"  id="title" name="title" type="text">
                            @error('title')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="example-text-input" >Slider Description</label>
                        <div class="col-sm-10">
                            <input class="form-control"  id="description" name="description" type="text">
                            @error('description')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-text-input" >Slider Image</label>
                        <input type="file" name="slider_img" class="form-control" >
                        @error('slider_img')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                    <br>
                    <input type="submit" class="btn btn-primary waves-effect waves-light" value="Add New">


                </form>


            </div>
        </div>
    </div> <!-- end col -->


                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->




@endsection
