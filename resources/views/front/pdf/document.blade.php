<!DOCTYPE html>
<html>
<head>
    <title>HTML to API - Invoice</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="content-type" content="text-html; charset=utf-8">
    <style type="text/css">
        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed,
        figure, figcaption, footer, header, hgroup,
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font: inherit;
            font-size: 100%;
            vertical-align: baseline;
        }

        html {
            line-height: 1;
        }

        ol, ul {
            list-style: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        caption, th, td {
            text-align: left;
            font-weight: normal;
            vertical-align: middle;
        }

        q, blockquote {
            quotes: none;
        }
        q:before, q:after, blockquote:before, blockquote:after {
            content: "";
            content: none;
        }

        a img {
            border: none;
        }

        article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
            display: block;
        }

        body {
            font-family: 'examplefont', "Yekan";
            font-weight: 300;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        body a {  font-family: 'examplefont', "Yekan";
            text-decoration: none;
            color: inherit;
        }
        body a:hover {  font-family: 'examplefont', "Yekan";
            color: inherit;
            opacity: 0.7;
        }
        body .container {  font-family: 'examplefont', "Yekan";
            min-width: 500px;
            margin: 0 auto;
            padding: 0 20px;
        }
        body .clearfix:after {  font-family: 'examplefont', "Yekan";
            content: "";
            display: table;
            clear: both;
        }
        body .left {  font-family: 'examplefont', "Yekan";
            float: left;
        }
        body .right {  font-family: 'examplefont', "Yekan";
            float: right;
        }
        body .helper {  font-family: 'examplefont', "Yekan";
            display: inline-block;
            height: 100%;
            vertical-align: middle;
        }
        body .no-break {  font-family: 'examplefont', "Yekan";
            page-break-inside: avoid;
        }

        header {  font-family: 'examplefont', "Yekan";
            margin-top: 20px;
            margin-bottom: 50px;
        }
        header figure {  font-family: 'examplefont', "Yekan";
            float: left;
            width: 60px;
            height: 60px;
            margin-right: 10px;
            background-color: #fdb414;
            border-radius: 50%;
            text-align: center;
        }
        header figure img {  font-family: 'examplefont', "Yekan";
            margin-top: 13px;
        }
        header .company-address {
            float: left;
            max-width: 150px;
            line-height: 1.7em;
        }
        header .company-address .title {  font-family: 'examplefont', "Yekan";
            color: #fdb414;
            font-weight: 400;
            font-size: 1.5em;
            text-transform: uppercase;
        }
        header .company-contact {  font-family: 'examplefont', "Yekan";
            float: right;
            height: 60px;
            padding: 0 10px;
            background-color: #fdb414;
            color: white;
        }
        header .company-contact span {  font-family: 'examplefont', "Yekan";
            display: inline-block;
            vertical-align: middle;
        }
        header .company-contact .circle {  font-family: 'examplefont', "Yekan";
            width: 20px;
            height: 20px;
            background-color: white;
            border-radius: 50%;
            text-align: center;
        }
        header .company-contact .circle img {  font-family: 'examplefont', "Yekan";
            vertical-align: middle;
        }
        header .company-contact .phone {  font-family: 'examplefont', "Yekan";
            height: 100%;
            margin-right: 20px;
        }
        header .company-contact .email {  font-family: 'examplefont', "Yekan";
            height: 100%;  font-family: 'examplefont', "Yekan";
            min-width: 100px;
            text-align: right;
        }

        section .details {  font-family: 'examplefont', "Yekan";
            margin-bottom: 55px;
        }
        section .details .client {  font-family: 'examplefont', "Yekan";
            width: 50%;
            line-height: 20px;
        }
        section .details .client .name {  font-family: 'examplefont', "Yekan";
            color: #fdb414;
        }
        section .details .data {  font-family: 'examplefont', "Yekan";
            width: 50%;
            text-align: right;
        }
        section .details .title {
            margin-bottom: 15px;
            color: #fdb414;
            font-size: 3em;
            font-weight: 400;
            text-transform: uppercase;
            font-family: 'examplefont', "Yekan";
        }
        section table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            font-size: 0.9166em;
            font-family: 'examplefont', "Yekan";
        }
        section table .qty, section table .unit, section table .total {
            width: 15%;
            font-family: 'examplefont', "Yekan";
        }
        section table .desc {
            width: 55%;
            font-family: 'examplefont', "Yekan";
        }
        section table thead {
            display: table-header-group;
            vertical-align: middle;
            border-color: inherit;
            font-family: 'examplefont', "Yekan";
        }
        section table thead th {
            padding: 5px 10px;
            background: #fdb414;
            border-bottom: 5px solid #FFFFFF;
            border-right: 4px solid #FFFFFF;
            text-align: right;
            color: white;
            font-weight: 400;
            text-transform: uppercase;
            font-family: 'examplefont', "Yekan";
        }
        section table thead th:last-child {
            font-family: 'examplefont', "Yekan";
            border-right: none;
        }
        section table thead .desc {
            font-family: 'examplefont', "Yekan";
            text-align: left;
        }
        section table thead .qty {
            font-family: 'examplefont', "Yekan";
            text-align: center;
        }
        section table tbody td {
            font-family: 'examplefont', "Yekan";
            padding: 10px;
            background: #E8F3DB;
            color: #777777;
            text-align: right;
            border-bottom: 5px solid #FFFFFF;
            border-right: 4px solid #E8F3DB;
        }
        section table tbody td:last-child {
            font-family: 'examplefont', "Yekan";
            border-right: none;
        }
        section table tbody h3 {
            font-family: 'examplefont', "Yekan";
            margin-bottom: 5px;
            color: #fdb414;
            font-weight: 600;
        }
        section table tbody .desc {  font-family: 'examplefont', "Yekan";  font-family: 'examplefont', "Yekan";
            text-align: left;
        }
        section table tbody .qty {  font-family: 'examplefont', "Yekan";  font-family: 'examplefont', "Yekan";
            text-align: center;
        }
        section table.grand-total {  font-family: 'examplefont', "Yekan";  font-family: 'examplefont', "Yekan";
            margin-bottom: 45px;
        }
        section table.grand-total td {  font-family: 'examplefont', "Yekan";  font-family: 'examplefont', "Yekan";
            padding: 5px 10px;
            border: none;
            color: #777777;
            text-align: right;
        }
        section table.grand-total .desc {  font-family: 'examplefont', "Yekan";  font-family: 'examplefont', "Yekan";
            background-color: transparent;
        }
        section table.grand-total tr:last-child td {  font-family: 'examplefont', "Yekan";  font-family: 'examplefont', "Yekan";
            font-weight: 600;
            color: #fdb414;
            font-size: 1.18181818181818em;
        }

        footer {  font-family: 'examplefont', "Yekan";  font-family: 'examplefont', "Yekan";
            margin-bottom: 20px;
        }
        footer .thanks {  font-family: 'examplefont', "Yekan";  font-family: 'examplefont', "Yekan";
            margin-bottom: 40px;
            color: #fdb414;
            font-size: 1.16666666666667em;
            font-weight: 600;
        }
        footer .notice {  font-family: 'examplefont', "Yekan";  font-family: 'examplefont', "Yekan";
            margin-bottom: 25px;
        }
        footer .end {  font-family: 'examplefont', "Yekan";  font-family: 'examplefont', "Yekan";
            padding-top: 5px;
            border-top: 2px solid #fdb414;
            text-align: center;
        }
    </style>
</head>

<body>
<header class="clearfix" style="direction: rtl">
    <div class="container">

            <img src="{{ public_path("/front/images/main-logo/parsegzoz-logo-header.png") }}" alt="" style="width: 150px; ">

        <div class="company-address">
            <h2 class="title"  >شرکت تولیدی صنعتی پارس اگزوز</h2>
            <p >
                استان البرز
                <br>
                کیلومتر 18 جاده مخصوص کرج - بزرگراه شهید لشکری
            </p>
        </div>

    </div>
</header>

<section >
    <div class="container">
        <div class="details clearfix">
            <div class="data right">
                <div class="title" >شماره سفارش:{{$orderDetails['id'] }}</div>
                <div class="date" >
                    @php echo date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])); @endphp تاریخ سفارش : <br>
                    مبلغ پرداخت :    {{ $orderDetails['grand_total'] }} تومان <br>
                    {{ $orderDetails['order_status'] }} : وضعیت سفارش     <br>
                    {{ $orderDetails['payment_method'] }} : شیوه پرداخت <br>
                </div>
            </div>
        </div>
        <div class="details clearfix">
            <div class="client right" style="text-align: right;direction: rtl">
                <p> فاکتور برای: {{$orderDetails['name']}} </p>
                <p class="name"></p>
                <p>{{ $orderDetails['address'] }}, {{ $orderDetails['city'] }}, {{ $orderDetails['state']}} ,{{ $orderDetails['country'] }}, {{ $orderDetails['pincode']}}</p>
                <a href="mailto:{{$orderDetails['email'] }}" style="font-family: sans-serif!important;">{{ $orderDetails['email'] }}</a>
            </div>

        </div>

        <table border="0" cellspacing="0" cellpadding="0" >
            <thead>
            <tr>
                <th> کدمحصول</th>
                <th> سایز</th>
                <th> رنگ</th>
                <th> تعداد</th>
                <th> قیمت واحد</th>
                <th> مجموع</th>
            </tr>
            </thead>
            <tbody>
            @php
            $subTotal = 0;
            @endphp
            @foreach ($orderDetails['orders_products'] as $product)

            <tr>
                <td >{{ $product['product_code']}}</td>
                <td >{{ $product['product_size']}}</td>
                <td >{{ $product['product_color']}}</td>
                <td >{{ $product['product_qty']}}</td>
                <td >{{ $product['product_price']}} تومان </td>
                <td >{{$product['product_qty'] * $product['product_price']}} تومان </td>
            </tr>
            @php
            $subTotal = $subTotal + ($product['product_price'] * $product['product_qty']);
            @endphp
            @endforeach
         </tbody>
        </table>
        <br>
        <div class="no-break">
            <table class="grand-total" style="">
                <tbody>
                <tr>
                    <td class="desc"></td>
                    <td class="unit" >مجموع:</td>
                    <td class="total"> تومان {{  $subTotal }}  </td>
                </tr>
                <tr>
                    <td class="desc"></td>
                    <td class="unit" >هزینه ارسال:</td>
                    <td class="total">تومان 0 </td>
                </tr>
                <tr>
                    <td class="desc"></td>
                    <td class="unit" > تخفیف:</td>';
                    @if ($orderDetails['coupon_amount']>0)
                    <td class="desc">{{$orderDetails['coupon_amount']}} </td>
                    @else
                    <td class="total"> 0 تومان</td>
                    @endif
                </tr>
                <tr>
                    <td class="desc"></td>
                    <td class="unit" > مجموع:</td>
                    <td class="total"> تومان  {{ $orderDetails['grand_total'] }}  </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<footer>
    <div class="container">
        <div class="thanks">با تشکر</div>
<!--        <div class="notice">
            <div>هشدار:</div>
            <div>A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
        </div>
        <div class="end">Invoice was created on a computer and is valid without the signature and seal.</div>-->
    </div>
</footer>

</body>

</html>
