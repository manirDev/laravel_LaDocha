<div class="sidebar-widget outer-bottom-small wow fadeInUp">
    <h3 class="section-title">Special Deals</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
            @for ($i = 0; $i < count($specialDeal); $i += 3)
                <div class="item">
                    <div class="products best-product">
                        @include('frontend.components._small_carousel', ['item' => $specialDeal[$i]])
                        @include('frontend.components._small_carousel', ['item' => $specialDeal[$i + 1]])
                        @include('frontend.components._small_carousel', ['item' => $specialDeal[$i + 2]])
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <!-- /.sidebar-widget-body -->
</div>
