@foreach($children as $subCategory)
    <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
        @if(count($subCategory->children))
            <h2 class="title">{{$subCategory->title}}</h2>
            @include('frontend.body._categoryTree', ['children' => $subCategory->children])
        @else
            <ul class="links">
                <li style="display: flex; gap: 4px; margin-bottom: 5px">
                    @if($subCategory->image)
                        <img src="{{asset($subCategory->image)}}" alt="" style="width: 30px; height: 30px; border-radius:5px;">
                    @endif
                    <a href="#"> {{$subCategory->title}}</a>
                </li>
            </ul>
        @endif

    </div>
@endforeach
