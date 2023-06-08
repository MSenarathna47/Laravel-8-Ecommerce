@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">

                                <h3 class="box-title">State List</h3>




                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Division Name </th>
                                            <th>District Name </th>
                                            <th>State Name </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>


                                        @foreach($state as $item)
                                        <tr>
                                           <td> {{ $item->division->division_name }}  </td>
                                           <td> {{ $item->district->district_name }}  </td>
                                           <td> {{ $item->state_name }}  </td>

                                           <td width="40%">

                                            <a href="{{ route('state.edit',$item->id) }}" class="btn btn-info btn-sm" title="Edit Data">
                                            <i class="fa fa-edit"></i> </a>

                                            <a href="{{ route('state.delete',$item->id) }}" class="btn btn-danger btn-sm" title="Delete Data" id="delete">
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

<!--   ------------ Add State Page -------- -->


      <div class="col-4">
        <div class="card">
            <div class="card-body">

                <h3 class="box-title">Add State </h3>





                <form method="post" action="{{ route('state.store') }}" >
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
               <h5>District Select <span class="text-danger">*</span></h5>
               <div class="controls">
                   <select name="district_id" class="form-control"  >
                       <option value="" selected="" disabled="">Select District</option>
                       @foreach($district as $dis)
                       <option value="{{ $dis->id }}">{{ $dis->district_name }}</option>
                       @endforeach
                   </select>
                   @error('district_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
                </div>
                    </div>



                <div class="form-group">
                   <h5>State Name  <span class="text-danger">*</span></h5>
                   <div class="controls">
                <input type="text"  name="state_name" class="form-control" >
                @error('state_name	')
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










