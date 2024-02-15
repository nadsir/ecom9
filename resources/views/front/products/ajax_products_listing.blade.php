<?php
use App\Models\Product;
?>
<script>$(document).ready(function() {
        (function ($) {
            $.fn.simpleMoneyFormat = function () {
                this.each(function (index, el) {
                    var elType = null; // input or other
                    var value = null;
                    // get value
                    if ($(el).is('input') || $(el).is('textarea')) {
                        value = $(el).val().replace(/,/g, '');
                        elType = 'input';
                    } else {
                        value = $(el).text().replace(/,/g, '');
                        elType = 'other';
                    }
                    // if value changes
                    $(el).on('paste keyup', function () {
                        value = $(el).val().replace(/,/g, '');
                        formatElement(el, elType, value); // format element
                    });
                    formatElement(el, elType, value); // format element
                });

                function formatElement(el, elType, value) {
                    var result = '';
                    var valueArray = value.split('');
                    var resultArray = [];
                    var counter = 0;
                    var temp = '';
                    for (var i = valueArray.length - 1; i >= 0; i--) {
                        temp += valueArray[i];
                        counter++
                        if (counter == 3) {
                            resultArray.push(temp);
                            counter = 0;
                            temp = '';
                        }
                    }
                    ;
                    if (counter > 0) {
                        resultArray.push(temp);
                    }
                    for (var i = resultArray.length - 1; i >= 0; i--) {
                        var resTemp = resultArray[i].split('');
                        for (var j = resTemp.length - 1; j >= 0; j--) {
                            result += resTemp[j];
                        }
                        ;
                        if (i > 0) {
                            result += ','
                        }
                    }
                    ;
                    if (elType == 'input') {
                        $(el).val(result);
                    } else {
                        $(el).empty().text(result);
                    }
                }
            };
        }(jQuery));
        $('.money').simpleMoneyFormat();
    });

</script>
<div class="row product-container grid-style" style="direction: rtl">
    @foreach( $categoryProducts as $product)
        <div class="product-item col-lg-3 col-md-6 col-sm-6" style="justify-content: center;">

            <div class="item" style="font-family: 'B Yekan';text-align: right;direction: rtl">
                <div class="image-container">
                    <a class="item-img-wrapper-link" href="{{url('product/'.$product['id'])}}" style="text-align: center;">
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
