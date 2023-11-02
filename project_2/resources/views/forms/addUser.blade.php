<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodawanie użytkownika</title>
</head>
<body>
    @if(session('result'))
        {{ session('result') }}
    @endif
    <form action="AddUser" method="post">
        @csrf
        <label>Podaj nazwę użytkownika:</label>
        <input type="text" name="name" require><br>
        @error('name')
            {{$message}}
        @enderror
        <label>Podaj email:</label>
        <input type="email" name="email" require><br>
        @error('email')
            {{$message}}
        @enderror
        <label>Powtórz email:</label>
        <input type="email" name="email_confirmation" require><br>
        <label>Podaj hasło:</label>
        <input type="password" name="password" require><br>
        @error('password')
            {{$message}}
        @enderror
        <label>Powtórz hasło:</label>
        <input type="password" name="password_confirmation" require><br>
        <input type="submit" value="Dodaj użytkownika">
    </form>
</body>
</html>