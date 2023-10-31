<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Testing</title>
</head>
<body>
    <p> Hello</p>
    <p>{{ $string}}</p>

    @foreach ($array as $item)
        {{ $item }}
    @endforeach
    
    <p>Hotel Setting name :: {{ $setting->name }}</p>
    <p>Hotel SEtting Email :: {{ $setting->email }}</p>
    <p>Hotel SEtting Occupancy :: {{ $setting->occupancy }}</p>
</body>
</html>