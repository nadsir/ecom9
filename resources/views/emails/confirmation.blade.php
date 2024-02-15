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
<div class="container" style="text-align: right;direction: rtl;float: right;font-family: 'B Yekan'">
    <div class="row">
        <div class="col">
            <table>
                <tr>
                    <td><img src="{{asset('front/images/main-logo/parsegzoz-logo-header.png')}}" alt="">
                        <hr>
                    </td>
                </tr>

                <tr>
                    <td>  {{$name}} عزیز </td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>لطفا لینک زیر را برای فعال شدن اکانت خود کلیک کنید.</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td><a href="{{url('/user/confirm/'.$code)}}">تایید اکانت</a></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>با تشکر از ثبت نام شما در سایت پارس اگزوز</td>
                </tr>
            </table>
        </div>
    </div>
</div>


</body>
</html>


