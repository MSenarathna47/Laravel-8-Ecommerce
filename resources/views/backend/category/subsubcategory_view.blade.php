@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <div class="page-content">
            <div class="container-fluid">               
                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">

                                <h2 class="card m-3"> Sub SubCategory List</h2>
                                
                               

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Categoty</th>
                                            <th>Sub Category</th>
                                            <th>Sub SubCategory Name</th>               
                                            <th>Action</th>                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($subsubcategory as $item )
                                        <tr>
                                            <td>{{$item['category'] ['category_name']}}</td>   
                                            <td>{{$item['subcategory'] ['subcategory_name']}}</td>     
                                            <td>{{$item->subsubcategory_name}}</td>                           
                                            <td>
                                                <a href="{{route('subsubcategory.edit',$item->id)}}" class="btn btn-info" >Edit</a>
                                                <a href="{{route('subsubcategory.delete',$item->id)}}" class="btn btn-danger" id="delete">Delete</a> 
                                            </td>                                                                               
                                        </tr> 
                                        @endforeach                                                                  
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->

                    {{-- //<i class="fa-fa-trash"></i> --}}

      {{------------------------------ Add Sub Sub Category Page ---------------------------}}


      <div class="col-4">
        <div class="card">
            <div class="card-body">

                <h2 class="card m-3">Add Sub SubCategory</h2>
               
                <form action="{{ route('subsubcategory.store') }}" method="post" >
                    @csrf

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="example-text-input" > Category Select</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="category_id" id="category_id" required="">
                                    <option selected="" disabled="" value="">Select Category</option>
                                    @foreach ($categories as $category )
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach                                
                                </select>
                                @error('category_id')
                                <span class="text-danger">{{$message}}</span>
                               @enderror

                            </div>
                        </div>
                    </div>   
                    

                    <div class="form-group">
                        <div class="mb-3">
                            <label for="example-text-input" > SubCategory Select</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="subcategory_id" id="" required="">
                                    <option selected="" disabled="" value="">Select Sub Category</option>
                                                                 
                                </select>

                                @error('subcategory_id')
                                <span class="text-danger">{{$message}}</span>
                               @enderror

                            </div>
                        </div>
                    </div>   
                    {{-- @foreach ($subcategories as $category )
                    <option value="{{$category->id}}">{{$category->subcategory_name}}</option>
                    @endforeach   --}}
                    


                    
                    <div class="form-group">
                        <label for="example-text-input" > Sub SubCategory Name</label>
                        <div class="col-sm-10">
                            <input class="form-control"  id="subsubcategory_name" name="subsubcategory_name" type="text">
                            @error('subsubcategory_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

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
        

        <script type="text/javascript">
            $(document).ready(function() {
              $('select[name="category_id"]').on('change', function(){
                  var category_id = $(this).val();
                  if(category_id) {
                      $.ajax({
                          url: "{{  url('/Category/subcategory/ajax') }}/"+category_id,
                          type:"GET",
                          dataType:"json",
                          success:function(data) {
                             var d =$('select[name="subcategory_id"]').empty();
                                $.each(data, function(key, value){
                                    $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');
                                });
                          },
                      });
                  } else {
                      alert('danger');
                  }
              });
          });
          </script>
      


@endsection