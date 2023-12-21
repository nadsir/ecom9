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
<table>
    <tr><td>عزیز {{$name}}</td></tr>
    <tr><td>&nbsp;</td></tr>
    <tr><td>لطفا لینک زیر را برای فعال شدن اکانت خود کلیک کنید. </td></tr>
    <tr><td>&nbsp;&nbsp;</td></tr>
    <tr><td><a href="{{url('/user/confirm/'.$code)}}">تایید اکانت</a></td></tr>
    <tr><td>&nbsp;&nbsp;</td></tr>
    <tr><td>باتشکر از شما</td></tr>
    <tr><td>فروشگاه x</td></tr>
</table>

</body>
</html>
