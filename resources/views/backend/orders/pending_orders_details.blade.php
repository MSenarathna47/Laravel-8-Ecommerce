@extends('admin.admin_master')
@section('admin')

        <div class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="box-title">Order Details</h3>
                            </div>
                        </div>
                    </div> <!-- end col -->

                    <div class="col-lg-6">
                        <div class="card border border-primary">
                            <div class="card-header bg-transparent border-primary">
                                <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Shipping Details</h5>
                            </div>
                            <div class="card-body">

                                <table class="table">
                                    <tr>
                                      <th> Shipping Name : </th>
                                       <th> {{ $order->name }} </th>
                                    </tr>

                                     <tr>
                                      <th> Shipping Phone : </th>
                                       <th> {{ $order->phone }} </th>
                                    </tr>

                                     <tr>
                                      <th> Shipping Email : </th>
                                       <th> {{ $order->email }} </th>
                                    </tr>

                                     <tr>
                                      <th> Division : </th>
                                       <th> {{ $order->division->division_name }} </th>
                                    </tr>

                                     <tr>
                                      <th> District : </th>
                                       <th> {{ $order->district->district_name }} </th>
                                    </tr>

                                     <tr>
                                      <th> State : </th>
                                       <th>{{ $order->state->state_name }} </th>
                                    </tr>

                                    <tr>
                                      <th> Post Code : </th>
                                       <th> {{ $order->post_code }} </th>
                                    </tr>

                                    <tr>
                                      <th> Order Date : </th>
                                       <th> {{ $order->order_date }} </th>
                                    </tr>

                                   </table>
                            </div>
                        </div>
                    </div>



                    <div class="col-lg-6">
                        <div class="card border border-primary">
                            <div class="card-header bg-transparent border-primary">
                                <h4 class="box-title"><strong>Order Details</strong><span class="text-danger"> Invoice : {{ $order->invoice_no }}</span></h4>
                            </div>
                            <div class="card-body">


<table class="table">
    <tr>
      <th>  Name : </th>
       <th> {{ $order->user->name }} </th>
    </tr>

     <tr>
      <th>  Phone : </th>
       <th> {{ $order->user->phone }} </th>
    </tr>

     <tr>
      <th> Payment Type : </th>
       <th> {{ $order->payment_method }} </th>
    </tr>

     <tr>
      <th> Tranx ID : </th>
       <th> {{ $order->transaction_id }} </th>
    </tr>

     <tr>
      <th> Invoice  : </th>
       <th class="text-danger"> {{ $order->invoice_no }} </th>
    </tr>

     <tr>
      <th> Order Total : </th>
       <th>${{ $order->amount }} </th>
    </tr>

    <tr>
      <th> Order : </th>
       <th>
      
        <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> </th>
    </tr>


    <tr>
      <th>  </th>
       <th>
           @if($order->status == 'pending')
           <a href="{{ route('pending-confirm',$order->id) }}" class="btn btn-block btn-success" id="confirm">Confirm Order</a>

           @elseif($order->status == 'confirm')
           <a href="{{ route('confirm.processing',$order->id) }}" class="btn btn-block btn-success" id="processing">Processing Order</a>

           @elseif($order->status == 'processing')
           <a href="{{ route('processing.picked',$order->id) }}" class="btn btn-block btn-success" id="picked">Picked Order</a>

           @elseif($order->status == 'picked')
           <a href="{{ route('picked.shipped',$order->id) }}" class="btn btn-block btn-success" id="shipped">Shipped Order</a>

           @elseif($order->status == 'shipped')
        <a href="{{ route('shipped.delivered',$order->id) }}" class="btn btn-block btn-success" id="delivered">Delivered Order</a>

           @endif

         </th>
    </tr>



   </table>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card border border-primary">
                            <div class="card-header bg-transparent border-primary">
                                {{-- <h5 class="my-0 text-primary"><i class="mdi mdi-bullseye-arrow me-3"></i>Primary outline Card</h5> --}}
                            </div>
                            <div class="card-body">



 <table class="table">
    <tbody>

      <tr>
        <td width="10%">
          <label for=""> Image</label>
        </td>

         <td width="20%">
          <label for=""> Product Name </label>
        </td>

     <td width="10%">
          <label for=""> Product Code</label>
        </td>


       <td width="10%">
          <label for=""> Color </label>
        </td>

        <td width="10%">
          <label for=""> Size </label>
        </td>

          <td width="10%">
          <label for=""> Quantity </label>
        </td>

       <td width="10%">
          <label for=""> Price </label>
        </td>

      </tr>


      @foreach($orderItem as $item)
<tr>
       <td width="10%">
          <label for=""><img src="{{ asset($item->product->product_thambnail) }}" height="50px;" width="50px;"> </label>
        </td>

       <td width="20%">
          <label for=""> {{ $item->product->product_name}}</label>
        </td>


        <td width="10%">
          <label for=""> {{ $item->product->product_code }}</label>
        </td>

       <td width="10%">
          <label for=""> {{ $item->color }}</label>
        </td>

       <td width="10%">
          <label for=""> {{ $item->size }}</label>
        </td>

        <td width="10%">
          <label for=""> {{ $item->qty }}</label>
        </td>

 <td width="10%">
          <label for=""> ${{ $item->price }}  ( $ {{ $item->price * $item->qty}} ) </label>
        </td>

      </tr>
      @endforeach



                            </div>
                        </div>
                    </div>

                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->




@endsection


























		  </div>
		  <!-- /. end row -->
		</section>
		<!-- /.content -->

	  </div>



