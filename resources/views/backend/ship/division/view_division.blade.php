@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">

                                <h3 class="box-title">Division List</h3>



                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Division Name </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>



                                        @foreach($divisions as $item)
                                        <tr>
                                           <td> {{ $item->division_name }}  </td>

                                           <td width="40%">

                                            <a href="{{ route('division.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data">
                                             <i class="fa fa-edit"></i> </a>

                                            <a href="{{ route('division.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
                                            <i class="fa fa-trash"></i></a>

                                           </td>

                                        </tr>
                                         @endforeach


                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->

                    {{-- //<i class="fa-fa-trash"></i> --}}

<!--   ------------ Add Division Page -------- -->


      <div class="col-4">
        <div class="card">
            <div class="card-body">

                <h3 class="box-title">Add Division </h3>


                <form method="post" action="{{ route('division.store') }}" >
                    @csrf


                <div class="form-group">
                   <h5>Division Name  <span class="text-danger">*</span></h5>
                   <div class="controls">
                <input type="text"  name="division_name" class="form-control" >
                @error('division_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
               </div>
               </div>



               <div class="text-xs-right">
                <br>
                <input type="submit" class="btn btn-primary btn-primary mb-5" value="Add New">
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


