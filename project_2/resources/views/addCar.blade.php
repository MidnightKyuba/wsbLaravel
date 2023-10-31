<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj auto</title>
</head>
<body>
    @if(session('result'))
        <br>{{ session('result') }}<br><br>
    @endif
    <form action="AddCar" method="post">
        @csrf
        <label>Marka:</label>
        <input type="text" name="brand" require><br>
        <label>Model:</label>
        <input type="text" name="model" require><br>
        <label>Pojemność:</label>
        <input type="number" name="capacity" min="0" step="1" require><br>
        <input type="submit" value="Wyślij">
    </form>
</body>
</html>