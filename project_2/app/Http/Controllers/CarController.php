<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function ShowTableCar(){
        //$data = DB::table('car')->get();
        $data = DB::table('car')->paginate(2);
        return View("car", ['car' => $data]);
    }

    public function AddCar(Request $req){
        $brand = $req->input('brand');
        $model = $req->input('model');
        $capacity = $req->input('capacity');
        $result = DB::insert("INSERT INTO car (brand, model, capacity) values (?, ?, ?)", [$brand, $model, $capacity]);
        if ($result > 0){
            $result = 'Rekord dodany prawidłowo!';
            return View('result', ['result'=>$result]);
        }
        else{
            return redirect()->back()->with('result', 'Nie udało się dodać rekordu do tabeli car');
        }
    }
}
