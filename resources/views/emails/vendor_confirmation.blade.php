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
<table style="text-align: right;direction: rtl;float: right">
    <tr><td><img src="{{asset('front/images/main-logo/parsegzoz-logo-header.png')}}" alt=""> <hr></td></tr>

    <tr><td style="padding-right: 20px"> {{$name}} سلام </td></tr>
    <tr><td>&nbsp;<br></td></tr>
    <tr><td style="padding-right: 20px">برای فعال شدن حساب فروشندگی شما لطفا وارد لینک زیر شوید</td></tr>
    <tr><td style="padding-right: 20px"><a href="{{url('vendor/confirm/'.$code)}}">{{url('vendor/confirm/'.$code)}}</a></td></tr>
    <tr><td>&nbsp;<br></td></tr>
    <tr><td style="padding-right: 20px">با تشکر و احترام</td></tr>
    <tr><td>&nbsp;<br></td></tr>
    <tr><td style="padding-right: 20px">شرکت تولید صنعتی پارس اگزوز</td></tr>

</table>

</body>
</html>
