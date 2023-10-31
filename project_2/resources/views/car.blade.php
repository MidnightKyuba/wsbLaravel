<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/tableStyle.css')}}">
    <title>Samochody</title>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>Marka</th>
                <th>Model</th>
                <th>Pojemność</th>
            </tr>
        </thead>
        <tbody>
        @foreach($car as $c)
            <tr>
                <td>{{$c->brand}}</td>
                <td>{{$c->model}}</td>
                <td>{{$c->capacity}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$car->links('pagination::bootstrap-5')}}
    <button><a href="{{'/addCarForms'}}">Dodaj Auto</a></button>
</body>
</html>