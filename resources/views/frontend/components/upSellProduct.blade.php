<section class="section featured-product wow fadeInUp">
    <h3 class="section-title">upsell products</h3>
    <div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
        @foreach($upSell as $item)
            @include('frontend.components._carousel', ['item' => $item])
        @endforeach
    </div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
