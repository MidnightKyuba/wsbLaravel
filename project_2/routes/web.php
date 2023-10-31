<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/show_name', function(){
    return 'text';
});

Route::get('/show_blade_city/{city}', function(string $city){
    return View('city', ['cityName'=>$city]);
});

Route::get('/pages/{page}', function(string $page){
    $pages = [
        'home' => 'strona domowa',
        'contact' => 'zaq@wp.pl',
        'adres' => 'Poznań, ul. Grunwaldzka 12000',
    ];
    return $pages[$page];
});

Route::get('/views/{view}', function(string $view){
    $views = [
        'strona_glowna' => 'welcome',
        'name' => 'profile.name',
    ];
    return View($views[$view] ?? 'welcome');
});

Route::get('/views/{view}/{city}', function(string $view, string $city){
    $views = [
        'city' => 'city',
    ];
    return View($views[$view] ?? 'welcome', ['cityName'=>$city]);
});

Route::get('/address/{city?}/{street?}/{zipCode?}', function(string $city = null, string $street = null, int $zipCode = null){
    if($zipCode !== null){
        $zipCode = substr($zipCode, offset:0, length:2).'-'.substr($zipCode, offset:2, length:3).';';
    }
    echo <<< ADDRESS
        Miasto: $zipCode $city<br>
        Ulica: $street<hr>
    ADDRESS; 
})->name('address');

Route::redirect('/adres/{city?}/{street?}/{zipCode?}','/address/{city?}/{street?}/{zipCode?}');

Route::prefix('admin')->group(function(){
    
    Route::get('/home', function(){
        return 'Strona domowa administratora';
    });

    Route::get('/users', function(){
        return 'Użytkownicy';
    });
});

Route::get('/films', function(){
    $films = [
        'nameFilm1' => 'film1',
        'nameFilm2' => 'film2',
        'nameFilm3' => 'film3',
    ];
    return View('films', ['films'=>$films]);
});

Route::get('/users', function(){
    $users = [
        ['firstName' => 'Janusz', 'lastName' => 'Nowak', 'city'=>'Poznań'],
        ['firstName' => 'Anna', 'lastName' => 'Nowak', 'city'=>'Poznań'],
        ['firstName' => 'Paweł', 'lastName' => 'Nowak', 'city'=>'Gniezno'],
    ];
    return View('users', ['users'=>$users]);
});

Route::get('/car', [CarController::class, 'ShowTableCar']);

Route::get('/addCarForms', function(){
    return View('addCar');
});

Route::post('AddCar', [CarController::class, 'AddCar']);
