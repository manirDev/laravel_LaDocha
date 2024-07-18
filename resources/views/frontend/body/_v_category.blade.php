@php
    $parentCategories = \App\Http\Controllers\Frontend\HomeController::categoryList();
@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">

            @foreach($parentCategories as $item)
            <li class="dropdown menu-item">
                <a href="{{route('category.detail.page', ['categoryID' => $item->id, 'slug' => $item->slug])}}"
                   class="dropdown-toggle" @if(count($item->children)) data-toggle="dropdown" @endif ><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{$item->title}}</a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <div class="row">
                            @if(count($item->children))
                                @include('frontend.body._categoryTree', ['children' => $item->children])
                            @endif

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </li>

                    <!-- /.yamm-content -->
                </ul>
                <!-- /.dropdown-menu -->
            </li>
            <!-- /.menu-item -->
            @endforeach
        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
