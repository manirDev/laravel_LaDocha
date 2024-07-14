<section class="section wow fadeInUp new-arriavls">
    <h3 class="section-title">New Arrivals</h3>
    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
        @foreach($arrivals as $item)
            @include('frontend.components._carousel', ['item' => $item])
        @endforeach
    </div>
    <!-- /.home-owl-carousel -->
</section>
