<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Request</title>
</head>
<body>

<h1>Hello {{ $request->users->name }}!</h1>

<div>Your request for changing your working schedule was {{$decision}}!</div>

<div>Request date: {{$request->date}}</div>

<div>Requested location: {{$request->locations->address}}</div>

<div>Blexr administration</div>

</body>
</html>