<?php
use App\Models\Product;
?>
<script>
    $(document).ready(function () {

        //change string to currency
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

    <!-- Products-List-Wrapper -->
    <div class="table-wrapper u-s-m-b-60" style="border-radius: 6px 6px 6px 6px;
-moz-border-radius: 6px 6px 6px 6px;
-webkit-border-radius: 6px 6px 6px 6px;
border: 1px solid #fdb414;">
        <table>
            <thead>
            <tr style="background-color: rgba(252,179,19,0.42);">
                <th>محصول</th>
                <th>قیمت</th>
                <th>تعداد</th>
                <th>مجموع</th>
                <th>وضعیت</th>
            </tr>
            </thead>
            <tbody>
            @php $total_price=0; @endphp
            @foreach($getCartItems as $item)
                <?php $getDiscountAttibutePrice=Product::getDiscountAttributePrice($item['product_id'],$item['size']);

                ?>

                <tr>
                    <td>
                        <div class="cart-anchor-image">
                            <a href="{{url('product/'.$item['product_id'])}}" style="display: flex">
                                <img src="{{asset('front/images/product_images/small/'.$item['product']['product_image'])}}" alt="Product">

                                <h6 style="margin-right: 20px">
                                    <table>
                                        <tr style="border :0px;"><td style="    padding: 0px;font-size: 10px">{{$item['product']['product_name']}}</td></tr>
                                        <tr style="border :0px;"><td style="    padding: 0px;font-size: 10px">{{$item['product']['product_code']}}</td></tr>
                                        <tr style="border :0px;"><td style="    padding: 0px;font-size: 10px">@if($item['size'] !='free'){{$item['size']}}@endif</td></tr>
                                        <tr style="border :0px;"><td style="    padding: 0px;font-size: 10px">@if($item['product']['product_color'] !='free'){{$item['product']['product_color']}}@endif</td></tr>
                                    </table>
                                </h6>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="cart-price" style="float: right">
                            @if($getDiscountAttibutePrice['discount']>0)
                                <div class="price-template" >
                                    <table>
                                        <tr style="border :0px">
                                            <td>
                                                <div class="item-new-price">
                                                    <strong class="money">{{$getDiscountAttibutePrice['final_price']}}</strong>  تومان
                                                </div>
                                            </td>

                                        </tr>
                                        <tr style="background-color: #ffeaea;border :0px">
                                            <td>
                                                <div class="item-old-price" style="margin-left: -40px">
                                                    <strong class="money">{{$getDiscountAttibutePrice['product_price']}}</strong> تومان
                                                </div>
                                            </td>
                                        </tr>
                                    </table>


                                </div>
                            @else
                                <div class="price-template">
                                    <div class="item-new-price">
                                        <strong class="money">{{$getDiscountAttibutePrice['product_price']}}</strong> تومان
                                    </div>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="cart-quantity">
                            <div class="quantity">
                                <input type="text" class="quantity-text-field" value="{{$item['quantity']}}">
                                <a class="  plus-a updateCartItem" data-cartid="{{$item['id']}}" data-qty="{{$item['quantity']}}" data-max="1000">&#43;</a>
                                <a class=" minus-a updateCartItem" data-cartid="{{$item['id']}}" data-qty="{{$item['quantity']}}" data-min="1">&#45;</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="cart-price">
                            <strong class="money">{{$getDiscountAttibutePrice['final_price']*$item['quantity']}}</strong> تومان
                        </div>
                    </td>
                    <td>
                        <div class="action-wrapper">
                            <button class="button button-outline-secondary fas fa-trash deleteCartItem" data-cartid="{{$item['id']}}"></button>
                        </div>
                    </td>
                </tr>
                @php
                    $total_price=$total_price+$getDiscountAttibutePrice['final_price']*$item['quantity'];

                    @endphp
            @endforeach

            </tbody>
        </table>
    </div>
    <!-- Products-List-Wrapper /- -->
    <!-- Coupon -->

    <!-- Coupon /- -->

<!-- Billing -->
<div class="calculation u-s-m-b-60">
    <div class="table-wrapper-2" style="border-radius: 6px 6px 6px 6px;
-moz-border-radius: 6px 6px 6px 6px;
-webkit-border-radius: 6px 6px 6px 6px;
border: 1px solid #fdb414;">
        <table>
            <thead>
            <tr style="background-color: rgba(252,179,19,0.42);">
                <th colspan="2">مجموع کارت</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <h3 class="calc-h3 u-s-m-b-0">مجموع کل</h3>
                </td>
                <td>
                    <span class="calc-text"><strong class="money">{{$total_price}}</strong> تومان </span>
                </td>
            </tr>
            <tr>
                <td>
                    <h3 class="calc-h3 u-s-m-b-0">تخفیف کوپن</h3>
                </td>
                <td>
                    <span class="calc-text ">
                        @if(Session::has('couponAmount'))
                              <strong class="couponAmount money">{{Session::get('couponAmount')}}</strong>تومان
                        @else
                            0 تومان
                        @endif
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <h3 class="calc-h3 u-s-m-b-0">مجموع نهایی</h3>
                </td>
                <td>
                    <span class="calc-text "><strong class="money grand_total">{{$total_price-Session::get('couponAmount')}}</strong> تومان </span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- Billing /- -->
