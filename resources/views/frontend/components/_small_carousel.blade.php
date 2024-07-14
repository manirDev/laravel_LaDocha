<div class="product">
    <div class="product-micro">
        <div class="row product-micro-row">
            <div class="col col-xs-5">
                <div class="product-image">
                    <div class="image">
                        <a href="{{route('product.detail.page', ['productID'=>$item->id, 'slug'=>$item->slug])}}">
                            <img
                                src="{{asset($item->image)}}"
                                alt="">
                        </a>
                    </div>
                    <!-- /.image -->

                </div>
                <!-- /.product-image -->
            </div>
            <!-- /.col -->
            <div class="col2 col-xs-7">
                <div class="product-info">
                    <h3 class="name"><a href="#">{{$item->title}}</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="product-price"><span class="price"> ${{$item->price}} </span>
                    </div>
                    <!-- /.product-price -->

                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.product-micro-row -->
    </div>
    <!-- /.product-micro -->

</div>
