<div class="product-list product">
    <div class="row product-list-row">
        <div class="col col-sm-4 col-lg-4">
            <div class="product-image">
                <div class="image"> <img src="{{asset($item->image)}}" alt=""> </div>
            </div>
            <!-- /.product-image -->
        </div>
        <!-- /.col -->
        <div class="col col-sm-8 col-lg-8">
            <div class="product-info">
                <h3 class="name"><a href="detail.html">{{$item->title}}</a></h3>
                <div class="rating rateit-small"></div>
                <div class="product-price"> <span class="price"> ${{$item->price}} </span> <span class="price-before-discount">$ {{$item->price}}</span> </div>
                <!-- /.product-price -->
                <div class="description m-t-10">{{$item->description}}.</div>
                <div class="cart clearfix animate-effect">
                    <div class="action">
                        <ul class="list-unstyled">
                            <li class="add-cart-button btn-group">
                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                            </li>
                            <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                            <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal"></i> </a> </li>
                        </ul>
                    </div>
                    <!-- /.action -->
                </div>
                <!-- /.cart -->

            </div>
            <!-- /.product-info -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.product-list-row -->
    <div class="tag new"><span>new</span></div>
</div>
<!-- /.product-list -->
