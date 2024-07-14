<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
    <div class="more-info-tab clearfix ">
        <h3 class="new-product-title pull-left">New Products</h3>
        <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
            <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a>
            </li>
            <li><a data-transition-type="backSlide" href="#clothing" data-toggle="tab">Clothing</a>
            </li>
            <li><a data-transition-type="backSlide" href="#electronics" data-toggle="tab">Electronics</a>
            </li>
            <li><a data-transition-type="backSlide" href="#shoes" data-toggle="tab">Shoes</a></li>
        </ul>
        <!-- /.nav-tabs -->
    </div>
    <div class="tab-content outer-top-xs">
        <div class="tab-pane in active" id="all">
            <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                    @foreach($All_latest as $item)
                        @include('frontend.components._carousel', ['item' => $item])
                    @endforeach
                    <!-- /.item -->
                </div>
                <!-- /.home-owl-carousel -->
            </div>
            <!-- /.product-slider -->
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="clothing">
            <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                    @foreach($Clothing_latest as $item)
                        @include('frontend.components._carousel', ['item' => $item])
                    @endforeach
                    <!-- /.item -->
                </div>
                <!-- /.home-owl-carousel -->
            </div>
            <!-- /.product-slider -->
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="electronics">
            <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                    @foreach($Electronics_latest as $item)
                        @include('frontend.components._carousel', ['item' => $item])
                    @endforeach
                </div>
                <!-- /.home-owl-carousel -->
            </div>
            <!-- /.product-slider -->
        </div>
        <!-- /.tab-pane -->

        <div class="tab-pane" id="shoes">
            <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme">
                    @foreach($Shoes_latest as $item)
                        @include('frontend.components._carousel', ['item' => $item])
                    @endforeach
                </div>
                <!-- /.home-owl-carousel -->
            </div>
            <!-- /.product-slider -->
        </div>
        <!-- /.tab-pane -->

    </div>
    <!-- /.tab-content -->
</div>
