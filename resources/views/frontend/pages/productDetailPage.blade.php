@extends('frontend.main_master')

@section('main-section')
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li><a href="{{route('home')}}">{{$product->category->title}}</a></li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">
                        <!-- ============================================== HOT DEALS ============================================== -->
                        @include('frontend.components.hotDeal')
                        <!-- ============================================== HOT DEALS: END ============================================== -->

                        <!-- ============================================== NEWSLETTER ============================================== -->
                        @include('frontend.widgets.newsLetter')
                        <!-- ============================================== NEWSLETTER: END ============================================== -->

                        <!-- ============================================== Testimonials============================================== -->
                        @include('frontend.widgets.testimonial')
                        <!-- ============================================== Testimonials: END ============================================== -->
                    </div>
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">

                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">

                                    <div id="owl-single-product">
                                        <div class="single-product-gallery-item" id="slide1">
                                            <a data-lightbox="image-1" data-title="Gallery"
                                               href="{{asset($product->image)}}">
                                                <img class="img-responsive" alt="" src="{{asset($product->image)}}"
                                                     data-echo="{{asset($product->image)}}"/>
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide2">
                                            <a data-lightbox="image-1" data-title="Gallery"
                                               href="assets/images/products/p9.jpg">
                                                <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                     data-echo="assets/images/products/p9.jpg"/>
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide3">
                                            <a data-lightbox="image-1" data-title="Gallery"
                                               href="assets/images/products/p10.jpg">
                                                <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                     data-echo="assets/images/products/p10.jpg"/>
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide4">
                                            <a data-lightbox="image-1" data-title="Gallery"
                                               href="assets/images/products/p11.jpg">
                                                <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                     data-echo="assets/images/products/p11.jpg"/>
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide5">
                                            <a data-lightbox="image-1" data-title="Gallery"
                                               href="assets/images/products/p12.jpg">
                                                <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                     data-echo="assets/images/products/p12.jpg"/>
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide6">
                                            <a data-lightbox="image-1" data-title="Gallery"
                                               href="assets/images/products/p13.jpg">
                                                <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                     data-echo="assets/images/products/p13.jpg"/>
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide7">
                                            <a data-lightbox="image-1" data-title="Gallery"
                                               href="assets/images/products/p14.jpg">
                                                <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                     data-echo="assets/images/products/p14.jpg"/>
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide8">
                                            <a data-lightbox="image-1" data-title="Gallery"
                                               href="assets/images/products/p15.jpg">
                                                <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                     data-echo="assets/images/products/p15.jpg"/>
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                        <div class="single-product-gallery-item" id="slide9">
                                            <a data-lightbox="image-1" data-title="Gallery"
                                               href="assets/images/products/p16.jpg">
                                                <img class="img-responsive" alt="" src="assets/images/blank.gif"
                                                     data-echo="assets/images/products/p16.jpg"/>
                                            </a>
                                        </div><!-- /.single-product-gallery-item -->

                                    </div><!-- /.single-product-slider -->


                                    <div class="single-product-gallery-thumbs gallery-thumbs">

                                        <div id="owl-single-product-thumbnails">
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product"
                                                   data-slide="1" href="#slide1">
                                                    <img class="img-responsive" width="85" alt=""
                                                         src="assets/images/blank.gif"
                                                         data-echo="assets/images/products/p17.jpg"/>
                                                </a>
                                            </div>

                                            <div class="item">
                                                <a class="horizontal-thumb" data-target="#owl-single-product"
                                                   data-slide="2" href="#slide2">
                                                    <img class="img-responsive" width="85" alt=""
                                                         src="assets/images/blank.gif"
                                                         data-echo="assets/images/products/p18.jpg"/>
                                                </a>
                                            </div>
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product"
                                                   data-slide="3" href="#slide3">
                                                    <img class="img-responsive" width="85" alt=""
                                                         src="assets/images/blank.gif"
                                                         data-echo="assets/images/products/p19.jpg"/>
                                                </a>
                                            </div>
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product"
                                                   data-slide="4" href="#slide4">
                                                    <img class="img-responsive" width="85" alt=""
                                                         src="assets/images/blank.gif"
                                                         data-echo="assets/images/products/p20.jpg"/>
                                                </a>
                                            </div>
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product"
                                                   data-slide="5" href="#slide5">
                                                    <img class="img-responsive" width="85" alt=""
                                                         src="assets/images/blank.gif"
                                                         data-echo="assets/images/products/p21.jpg"/>
                                                </a>
                                            </div>
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product"
                                                   data-slide="6" href="#slide6">
                                                    <img class="img-responsive" width="85" alt=""
                                                         src="assets/images/blank.gif"
                                                         data-echo="assets/images/products/p22.jpg"/>
                                                </a>
                                            </div>
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product"
                                                   data-slide="7" href="#slide7">
                                                    <img class="img-responsive" width="85" alt=""
                                                         src="assets/images/blank.gif"
                                                         data-echo="assets/images/products/p23.jpg"/>
                                                </a>
                                            </div>
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product"
                                                   data-slide="8" href="#slide8">
                                                    <img class="img-responsive" width="85" alt=""
                                                         src="assets/images/blank.gif"
                                                         data-echo="assets/images/products/p24.jpg"/>
                                                </a>
                                            </div>
                                            <div class="item">

                                                <a class="horizontal-thumb" data-target="#owl-single-product"
                                                   data-slide="9" href="#slide9">
                                                    <img class="img-responsive" width="85" alt=""
                                                         src="assets/images/blank.gif"
                                                         data-echo="assets/images/products/p25.jpg"/>
                                                </a>
                                            </div>
                                        </div><!-- /#owl-single-product-thumbnails -->


                                    </div><!-- /.gallery-thumbs -->

                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name">{{$product->title}}</h1>

                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">(13 Reviews)</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->

                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value">In Stock</span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->

                                    <div class="description-container m-t-20">
                                        {{$product->description}}
                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">


                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    <span class="price">${{$product->price}}</span>
                                                    <span class="price-strike">${{$product->price}}</span>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="favorite-button m-t-10">
                                                    <a class="btn btn-primary" data-toggle="tooltip"
                                                       data-placement="right" title="Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip"
                                                       data-placement="right" title="Add to Compare" href="#">
                                                        <i class="fa fa-signal"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip"
                                                       data-placement="right" title="E-mail" href="#">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div><!-- /.row -->
                                    </div><!-- /.price-container -->

                                    <div class="quantity-container info-container">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <span class="label">Qty :</span>
                                            </div>

                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="arrow plus gradient"><span class="ir"><i
                                                                        class="icon fa fa-sort-asc"></i></span></div>
                                                            <div class="arrow minus gradient"><span class="ir"><i
                                                                        class="icon fa fa-sort-desc"></i></span></div>
                                                        </div>
                                                        <input type="text" value="1">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-7">
                                                <a href="#" class="btn btn-primary"><i
                                                        class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                            </div>


                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->


                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                    <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">
                                                {{$product->detail}}
                                            </p>
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    @include('frontend.components.productReview')

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">

                                            <h4 class="title">Product Tags</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">

                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags: </label>
                                                        <input type="email" id="exampleInputTag"
                                                               class="form-control txt">


                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">ADD TAGS
                                                    </button>
                                                </div><!-- /.form-container -->
                                            </form><!-- /.form-cnt -->

                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                                </div>
                                            </form><!-- /.form-cnt -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.product-tabs -->

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    @include('frontend.components.upSellProduct')
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div><!-- /.row -->

@endsection
