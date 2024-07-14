@php
    $parentCategories = \App\Http\Controllers\Frontend\HomeController::categoryList();
@endphp

@foreach($parentCategories as $item)
<li class="dropdown yamm mega-menu"> <a href="#"  class="dropdown-toggle" @if(count($item->children)) data-hover="dropdown" data-toggle="dropdown" @endif>{{$item->title}}</a>
    <ul class="dropdown-menu container">
        <li>
            <div class="yamm-content ">
                <div class="row">
                    @if(count($item->children))
                        @include('frontend.body._categoryTree', ['children' => $item->children])
                    @endif
                    <!-- /.col -->
                    <!-- /.yamm-content -->
                </div>
            </div>
        </li>
    </ul>
</li>

@endforeach
