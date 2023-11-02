<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AddUserController extends Controller
{
    public function storeUser(Request $req){
        $req->validate([
            'name' => 'required | min:2',
            'email' => 'required | min:5 | email |same:email_confirmation',
            'password' => 'required | same:password_confirmation|regex:/(?=.*[0-9])/',
        ]);
        $name = $req->input('name');
        $email = $req->input('email');
        $password = Hash::make($req->input('password'));
        $result = DB::insert("INSERT INTO users (name, email, password) values (?, ?, ?)", [$name, $email, $password]);
        if($result == 1){
            return "Rekord dodany prawidłowo!";
        }
        else{
            return "Error!";
        }
    }
}
