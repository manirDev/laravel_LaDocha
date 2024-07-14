<section class="section featured-product wow fadeInUp">
    <h3 class="section-title">Featured products</h3>
    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
        @foreach($featured as $item)
            @include('frontend.components._carousel', ['item' => $item])
        @endforeach
    </div>
    <!-- /.home-owl-carousel -->
</section>
