<?php
use App\Models\Product;
?>
<div class="row product-container grid-style">
    @foreach( $categoryProducts as $product)
        <div class="product-item col-lg-3 col-md-6 col-sm-6">

            <div class="item" style="font-family: 'B Yekan'">
                <div class="image-container">
                    <a class="item-img-wrapper-link" href="{{url('product/'.$product['id'])}}">
                        @php($product_image_path='front/images/product_images/small/'.$product['product_image'])
                        @if(!empty($product['product_image']) && file_exists($product_image_path))
                            <img class="img-fluid" src="{{asset($product_image_path)}}" alt="Product">
                        @else
                            <img class="img-fluid" src="{{asset('front/images/product_images/small/no-image.png')}}" alt="Product">
                        @endif
                    </a>
                    <div class="item-action-behaviors">
                        <a class="item-quick-look" data-toggle="modal" href="#quick-view">Quick Look</a>
                        <a class="item-mail" href="javascript:void(0)">Mail</a>
                        <a class="item-addwishlist" href="javascript:void(0)">Add to Wishlist</a>
                        <a class="item-addCart" href="javascript:void(0)">Add to Cart</a>
                    </div>
                </div>

                <div class="item-content">
                    <div class="what-product-is" style="text-align: center">

                        <h6 class="item-title">
                            <a href="single-product.html">{{$product['product_name']}}</a>
                        </h6>
                        <div class="item-description">
                            <p>{{$product['description']}}</p>
                        </div>
                        <!--                        <div class="item-stars">
                                                    <div class='star' title="4.5 out of 5 - based on 23 Reviews">
                                                        <span style='width:67px'></span>
                                                    </div>
                                                    <span>(23)</span>
                                                </div>-->
                    </div>

                    <?php
                    $getDiscoutnPrice=Product::getDiscountPrice($product['id']);
                    ?>
                    @if($getDiscoutnPrice>0)
                        <div class="price-template" style="display: flex;flex-direction: column;align-items: center;font-family: 'B Yekan'">

                            <div class="item-new-price">
                                تومان <strong class="money">{{$getDiscoutnPrice}}</strong>
                            </div>
                            <div class="item-old-price " style="margin-top: 12px; margin-bottom: 12px;">
                                تومان <strong class="money">{{$product['product_price']}}</strong>
                            </div>
                        </div>
                    @else
                        <div class="price-template" style="    display: flex;flex-direction: column;align-items: center;font-family: 'B Yekan'">
                            <div class="item-new-price input-element">
                                <strong class="money">{{$product['product_price']}}</strong> تومان
                            </div>
                            <div class="item-new-price money"  style="visibility: hidden;margin-bottom: 12px;margin-top:12px">
                                تومان <strong class="money">{{$product['product_price']}}</strong>
                            </div>
                        </div>
                    @endif
                    <div class="" style="text-align: center ; margin-top: 5px">
                        <a class="" href="{{url('product/'.$product['id'])}}">
                        <button class="btn btn-secondary basket-shopping" >
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>
                        </a>

                    </div>
                </div>
                <?php $isProductNew=Product::isProductNew($product['id']); ?>
                @if($isProductNew=="Yes")
                    <div class="tag new">
                        <span>جدید</span>
                    </div>
                @endif
            </div>

        </div>
    @endforeach
</div>
