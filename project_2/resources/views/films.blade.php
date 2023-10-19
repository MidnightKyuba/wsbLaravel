<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Films</title>
</head>
<body>
    <ul style="list-style-type:circle">
    @foreach($films as $film)
        <li>{{$film}}</li>
    @endforeach
    </ul>
</body>
</html>