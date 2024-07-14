<div class="banner cnt-strip">
    <div class="image">
        <img class="img-responsive"  src="{{asset($item->image)}}" alt="" style="width: fit-content">
    </div>
    <div class="strip strip-text">
        <div class="strip-inner">
            <h2 class="text-right">
{{--                New {{strtoupper($item->category->title)}}, Men Fashion<br>--}}
                New {{$categoryTitle}} Fashion<br>
                <span class="shopping-needs">Save up to 40% off</span>
            </h2>
        </div>
    </div>
    <div class="new-label">
        <div class="text">NEW</div>
    </div>
    <!-- /.new-label -->
</div>
