
@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();
    //dd($route);
@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{asset('backend')}}/images/logo-dark.png" alt="">
                        <h3><b>LaDocha</b> Admin</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="header nav-small-cap">Main</li>

            <li class=" {{ ($route == 'admin.home') ? 'active' : '' }} ">
                <a href="{{url('admin')}}">
                    <i class="ti-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="header nav-small-cap">Product</li>

            <li class="treeview {{ ($prefix == '/category') ? 'active' : '' }}">
                <a href="#">
                    <i class="ti-layout-grid2"></i>
                    <span>Categories</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'admin.category') ? 'active' : '' }}">
                        <a href="{{route('admin.category')}}"><i class="ti-more"></i>All Categories</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == '/product') ? 'active' : '' }}">
                <a href="#">
                    <i class="ti-dropbox-alt"></i> <span>Products</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'admin.product') ? 'active' : '' }}">
                        <a href="{{route('admin.product')}}"><i class="ti-more"></i>All Products</a>
                    </li>
                    <li class="{{ ($route == 'admin.product.add') ? 'active' : '' }}">
                        <a href="{{route('admin.product.add')}}"><i class="ti-more"></i>Add Product</a>
                    </li>
                </ul>
            </li>

            <li class="header nav-small-cap">Others</li>

            <li class="treeview {{ ($prefix == '/faq') ? 'active' : '' }}">
                <a href="#">
                    <i class="ti-help"></i>
                    <span>Faqs</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'admin.faq') ? 'active' : '' }}">
                        <a href="{{route('admin.faq')}}"><i class="ti-more"></i>All Faqs</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == '/message') ? 'active' : '' }}">
                <a href="#">
                    <i class="ti-email"></i>
                    <span>Messages</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'admin.message') ? 'active' : '' }}">
                        <a href="{{route('admin.message')}}"><i class="ti-more"></i>All Messages</a>
                    </li>
                </ul>
            </li>

            <li class="treeview {{ ($prefix == '/setting') ? 'active' : '' }}">
                <a href="#">
                    <i class="ti-settings"></i>
                    <span>Settings</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ ($route == 'admin.setting') ? 'active' : '' }}">
                        <a href="{{route('admin.setting')}}"><i class="ti-more"></i>Edit Setting</a>
                    </li>
                </ul>
            </li>



            <li class="treeview">
                <a href="#">
                    <i data-feather="hard-drive"></i>
                    <span>Content</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="content_typography.html"><i class="ti-more"></i>Typography</a></li>
                    <li><a href="content_media.html"><i class="ti-more"></i>Media</a></li>
                    <li><a href="content_grid.html"><i class="ti-more"></i>Grid</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="package"></i>
                    <span>Utilities</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="utilities_border.html"><i class="ti-more"></i>Border</a></li>
                    <li><a href="utilities_color.html"><i class="ti-more"></i>Color</a></li>
                    <li><a href="utilities_ribbons.html"><i class="ti-more"></i>Ribbons</a></li>
                    <li><a href="utilities_tab.html"><i class="ti-more"></i>Tabs</a></li>
                    <li><a href="utilities_animations.html"><i class="ti-more"></i>Animation</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="edit-2"></i>
                    <span>Icons</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="icons_fontawesome.html"><i class="ti-more"></i>Font Awesome</a></li>
                    <li><a href="icons_glyphicons.html"><i class="ti-more"></i>Glyphicons</a></li>
                    <li><a href="icons_material.html"><i class="ti-more"></i>Material Icons</a></li>
                    <li><a href="icons_themify.html"><i class="ti-more"></i>Themify Icons</a></li>
                    <li><a href="icons_simpleline.html"><i class="ti-more"></i>Simple Line Icons</a></li>
                    <li><a href="icons_cryptocoins.html"><i class="ti-more"></i>Cryptocoins Icons</a></li>
                    <li><a href="icons_flag.html"><i class="ti-more"></i>Flag Icons</a></li>
                    <li><a href="icons_weather.html"><i class="ti-more"></i>Weather Icons</a></li>
                </ul>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="{{route('admin.setting')}}" class="link" data-toggle="tooltip" title="" data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="{{route('admin.logout')}}" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
