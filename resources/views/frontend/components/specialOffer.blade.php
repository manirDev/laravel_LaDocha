<div class="sidebar-widget outer-bottom-small wow fadeInUp">
    <h3 class="section-title">Special Offer</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
            @for ($i = 0; $i < count($specialOffer); $i += 3)
                <div class="item">
                    <div class="products best-product">
                        @include('frontend.components._small_carousel', ['item' => $specialOffer[$i]])
                        @include('frontend.components._small_carousel', ['item' => $specialOffer[$i + 1]])
                        @include('frontend.components._small_carousel', ['item' => $specialOffer[$i + 2]])
                    </div>
                </div>
            @endfor
        </div>
    </div>
    <!-- /.sidebar-widget-body -->
</div>
