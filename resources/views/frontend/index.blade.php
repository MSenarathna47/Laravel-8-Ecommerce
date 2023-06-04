@extends('frontend.main_master')
@section('content')
@section('title')
Home Easy Online Shop
@endsection
<div class="body-content outer-top-xs" id="top-banner-and-menu">
    <div class="container">
      <div class="row">
            <!-- ================================== SIDEBAR =============================== -->
            <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
            <!-- ================================== VERTICAL MENU ========================= -->
                    @include('frontend.common.vertical_menu')
            <!-- ================================== VERTICAL MENU : END =================== -->

        <!-- ============================================== HOT DEALS ============================================== -->
                    @include('frontend.common.hot_deals')
        <!-- ============================================== HOT DEALS: END ============================================== -->
          <!-- ============================================== SPECIAL OFFER ============================================== -->
                        @include('frontend.common.special_offer')
        <!-- ============================================== SPECIAL OFFER : END ============================================== -->

        <!-- ===== ===== PRODUCT TAGS ==== ====== -->
        @include('frontend.common.product_tags')
        <!-- ==== ===== PRODUCT TAGS : END ======= ==== -->
        <!-- ============================================== SPECIAL DEALS ============================================== -->

                    @include('frontend.common.special_deals')
          <!-- ============================================== SPECIAL DEALS : END ============================================== -->


            </div>
            <!-- ================================== SIDEBAR : END ========================= -->

            <!-- ================================== CONTENT =============================== -->

                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">


                <!-- ============================== SLIDER – VIEW ========================= -->
                    @include('frontend.common.sliderview')
                <!-- ============================== SLIDER – VIEW : END =================== -->

                <!-- ============================== INFO BOXES ============================ -->
                    @include('frontend.common.infobox')
                 <!-- ============================= INFO BOXES : END ====================== -->

            <!-- ================================== SCROLL TABS =========================== -->
                    @include('frontend.common.scrolltabs')
           <!-- =================================== SCROLL TABS : END ===================== -->

            <!-- ================================== WIDE PRODUCTS ========================= -->
                    @include('frontend.common.wideproduct')
                 <!-- /.wide-banners -->
            <!-- ================================== WIDE PRODUCTS : END =================== -->

            <!-- ================================== FEATURED PRODUCTS ===================== -->
                    @include('frontend.common.featured_product')
            <!-- ================================== FEATURED PRODUCTS : END =============== -->

                </div>
            <!-- ================================== CONTENT : END ========================= -->
      </div>  <!-- /.row -->
      <!-- ======================================== BRANDS  =============================== -->
              @include('frontend.body.brands')
      <!-- ======================================== BRANDS  : END ========================= -->
   </div> <!-- /.container -->
</div>
@endsection
