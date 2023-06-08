@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">

                                <h3 class="box-title">District List</h3>



                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Division Name </th>
                                            <th>District Name </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($district as $item)
                                        <tr>
                                           <td> {{ $item->division->division_name }}  </td>
                                           <td> {{ $item->district_name }}  </td>

                                           <td width="40%">

                                            <a href="{{ route('district.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data">
                                            <i class="fa fa-edit"></i> </a>

                                            <a href="{{ route('district.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
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

<!--   ------------ Add District Page -------- -->


      <div class="col-4">
        <div class="card">
            <div class="card-body">

                <h3 class="box-title">Add District </h3>




                <form method="post" action="{{ route('district.store') }}" >
                    @csrf



                <div class="form-group">
                <h5>Division Select <span class="text-danger">*</span></h5>
                <div class="controls">
                <select name="division_id" class="form-control"  >
                    <option value="" selected="" disabled="">Select Division</option>
                    @foreach($division as $div)
                    <option value="{{ $div->id }}">{{ $div->division_name }}</option>
                    @endforeach
                </select>
                @error('division_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                    </div>



                <div class="form-group">
                <h5>District Name  <span class="text-danger">*</span></h5>
                <div class="controls">
                <input type="text"  name="district_name" class="form-control" >
                @error('district_name')
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




