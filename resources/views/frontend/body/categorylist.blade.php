<ul class="nav navbar-nav">
    <li class="active dropdown yamm-fw"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a> </li>
      <!--   Get Category Table Data -->
        @php
        $categories = App\Models\Category::orderBy('category_name','ASC')->get();
        @endphp
        @foreach($categories as $category)
        <li class="dropdown yamm mega-menu">
            <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{ $category->category_name }}</a>
            <ul class="dropdown-menu container">
                <li>
                    <div class="yamm-content ">
                        <div class="row">
                            <!--  Get SubCategory Table Data -->
                            @php
                            $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                            @endphp
                            @foreach($subcategories as $subcategory)
                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug ) }}">
                                    <h2 class="title">{{ $subcategory->subcategory_name }}</h2>
                                </a>
                                   <!--   // Get SubSubCategory Table Data -->
                                @php
                                $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name','ASC')->get();
                                @endphp
                                @foreach($subsubcategories as $subsubcategory)
                                    <ul class="links">
                                    <li>
                                        <a href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug ) }}">{{ $subsubcategory->subsubcategory_name }}</a>
                                    </li>
                                    </ul>
                                @endforeach <!-- // End SubSubCategory Foreach -->
                            </div>
                            <!-- /.col -->
                            @endforeach <!-- // End SubCategory Foreach -->
                            <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/top-menu-banner.jpg') }}" alt=""> </div>
                            <!-- /.yamm-content -->
                        </div>
                    </div>
                </li>
            </ul>
        </li>
        @endforeach <!-- // End Category Foreach -->
    </li>
{{-- <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a> </li> --}}
</ul>












