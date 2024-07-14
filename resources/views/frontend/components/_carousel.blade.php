<div class="item item-carousel">
    <div class="products">
        <div class="product">
            <div class="product-image">
                <div class="image">
                    <a href="{{route('product.detail.page', ['productID'=>$item->id, 'slug'=>$item->slug])}}">
                        <img
                            src="{{asset($item->image)}}"
                            alt="">
                    </a>
                </div>
                <!-- /.image -->

                <div class="tag new"><span>new</span></div>
            </div>
            <!-- /.product-image -->

            <div class="product-info text-left">
                <h3 class="name">
                    <a href="{{route('product.detail.page', ['productID'=>$item->id, 'slug'=>$item->slug])}}">{{$item->title}}</a>
                </h3>
                <div class="rating rateit-small"></div>
                <div class="description"></div>
                <div class="product-price"><span class="price"> ${{$item->price}} </span>
                    <span class="price-before-discount">$ {{$item->price}}</span></div>
                <!-- /.product-price -->

            </div>
            <!-- /.product-info -->
            <div class="cart clearfix animate-effect">
                <div class="action">
                    <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                            <button data-toggle="tooltip"
                                    class="btn btn-primary icon" type="button"
                                    title="Add Cart"><i
                                    class="fa fa-shopping-cart"></i></button>
                            <button class="btn btn-primary cart-btn" type="button">
                                Add to cart
                            </button>
                        </li>
                        <li class="lnk wishlist"><a data-toggle="tooltip"
                                                    class="add-to-cart"
                                                    href="detail.html"
                                                    title="Wishlist"> <i
                                    class="icon fa fa-heart"></i> </a></li>
                        <li class="lnk"><a data-toggle="tooltip" class="add-to-cart"
                                           href="detail.html" title="Compare"> <i
                                    class="fa fa-signal" aria-hidden="true"></i>
                            </a></li>
                    </ul>
                </div>
                <!-- /.action -->
            </div>
            <!-- /.cart -->
        </div>
        <!-- /.product -->

    </div>
    <!-- /.products -->
</div>
