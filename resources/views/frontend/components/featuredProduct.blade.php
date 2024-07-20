<section class="section featured-product wow fadeInUp">
    <h3 class="section-title">Featured products</h3>
    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
        @foreach($featured as $item)
            <div class="item item-carousel">
                <div class="products">
                    @include('frontend.widgets.product_card', ['item' => $item])
                </div>
                <!-- /.products -->
            </div>
        @endforeach
    </div>
    <!-- /.home-owl-carousel -->
</section>
