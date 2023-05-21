@extends('frontend.main_master')
@section('content')
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
      <div class="row">
            <!-- ============================================== SIDEBAR ============================================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
            <!-- === == VERTICAL MENU == ==== -->
                    @include('frontend.common.vertical_menu')
            <!-- ===== ==== VERTICAL MENU : END ==== ===== -->
            </div>
            <!-- ============================================== SIDEBAR : END ============================================== -->

            <!-- ============================================== CONTENT ============================================== -->

                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                <!-- ========================================== SLIDER – VIEW ========================================= -->
                    @include('frontend.common.sliderview')
                <!-- ========================================= SLIDER – VIEW : END ========================================= -->
                </div>

            <!-- ============================================== CONTENT : END ============================================== -->
      </div>  <!-- /.row -->

      <!-- ============================================== BRANDS  ============================================== -->
              @include('frontend.body.brands')
      <!-- ============================================== BRANDS  : END ============================================== -->
   </div> <!-- /.container -->
</div>
@endsection
