<div class="best-deal wow fadeInUp outer-bottom-xs">
    <h3 class="section-title">Best seller</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
            @for ($i = 0; $i < count($bestSeller); $i += 2)
                <div class="item">
                    <div class="products best-product">
                        @include('frontend.components._small_carousel', ['item' => $bestSeller[$i]])
                        @include('frontend.components._small_carousel', ['item' => $bestSeller[$i + 1]])
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <!-- /.sidebar-widget-body -->
</div>
