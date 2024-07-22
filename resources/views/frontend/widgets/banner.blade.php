<div class="banner cnt-strip">
    <div class="image">
        <img  src="{{asset($item->image)}}" alt="" @if($categoryTitle=='Men') width="848" height="201" @else class="img-responsive" @endif>
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
