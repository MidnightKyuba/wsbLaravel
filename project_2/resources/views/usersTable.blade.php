<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/tableStyle.css')}}">
    <title>Użytkownicy</title>
</head>
<body>
    <h3>Użytkownicy z tablicy users</h3>
    <table class='table'>
        <thead>
            <tr>
                <th>Nazwa użytkownika</th>
                <th>E-mail użytkownika</th>
                <th>Użytkownika utowrzono</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
                <tr>
                    <th>{{$u->name}}</th>
                    <th>{{$u->email}}</th>
                    <th>{{$u->created_at}}</th>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{'/addUserForm'}}">Dodaj użytkownika</a>
</body>
</html>