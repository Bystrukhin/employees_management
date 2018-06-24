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

<h1>Hello {{ $user->name }}!</h1>

<div>You've been added to our request api. Now you can use it for making requests for home working days! </div>
<div>Credentials for entering system are your email and password: {{$code}}.</div>
<div>The address of the site <a href="{{url("/signin")}}">{{url("/signin")}}</a></div>

</body>
</html>