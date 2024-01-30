<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table style="width: 700px;text-align: right;direction: rtl" >
    <tr><td>&nbsp;</td></tr>
    <tr><td><img src="{{asset('front/images/mail-logo/stack-developers-logo.png')}}" alt=""></td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td> سلام  {{$name}}</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>با تشکر از خرید شما جزئیات خرید شما به شرح زیر می باشد :</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>شماره سفارش  {{$order_id}} </td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>
            <table style="width: 95%" cellpadding="5" cellspacing="5" bgcolor="#f9f9f9">
                <tr bgcolor="#cccccc">
                    <td>نام محصول</td>
                    <td>کدمحصول</td>
                    <td>سایز محصول</td>
                    <td>رنگ محصول</td>
                    <td>تعداد محصول</td>
                    <td>قیمت محصول</td>
                </tr>
                @foreach($orderDetails['orders_products'] as $order)
                    <tr bgcolor="#cccccc">
                        <td>{{$order['product_name']}}</td>
                        <td>{{$order['product_code']}}</td>
                        <td>{{$order['product_size']}}</td>
                        <td>{{$order['product_color']}}</td>
                        <td>{{$order['product_qty']}}</td>
                        <td>{{$order['product_price']}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="5" align="right">هزینه ارسال محصول</td>
                    <td>تومان {{$orderDetails['shipping_charges']}}</td>
                </tr>
                <tr>
                    <td colspan="5" align="right">کد تخفیف :</td>
                    <td>تومان
                        @if($orderDetails['coupon_amount']>0)
                        {{$orderDetails['coupon_amount']}}
                        @else
                            0
                        @endif
                    </td>
                </tr>
                <tr>
                    <td colspan="5" align="right">مجموع کل :</td>
                    <td>تومان {{$orderDetails['grand_total']}}</td>
                </tr>

            </table>
        </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr>
        <td>
            <table>
                <tr>
                    <td><strong>آدرس ارسال :</strong></td>
                </tr>
                <tr>
                    <td>{{$orderDetails['name']}}</td>
                </tr>
                <tr>
                    <td>{{$orderDetails['country']}}</td>
                </tr>
                <tr>
                    <td>{{$orderDetails['state']}}</td>
                </tr>
                <tr>
                    <td>{{$orderDetails['city']}}</td>
                </tr>

                <tr>
                    <td>{{$orderDetails['address']}}</td>
                </tr>
                <tr>
                    <td>{{$orderDetails['mobile']}}</td>
                </tr>
                <tr>
                    <td>{{$orderDetails['pincode']}}</td>
                </tr>


            </table>

        </td>
    </tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td><a href="{{url('orders/invoice/download/'.$orderDetails['id'])}}">برای دانلود فاکتور کلیک کنید</a></td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>برای رفع هرگونه مشکل سوال مورد نظر را ارسال کنید <a href="mailto:info@parsegzoz.com">info@parsegzoz.com</a></td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>با احترام<br>تیم پشتیبانی پارس اگزوز  </td></tr>
    <tr><td>&nbsp;</td></tr>

</table>

</body>
</html>
