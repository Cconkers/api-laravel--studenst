<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
            //Comprobar email en la base de datos y contraseña
            if (Auth::attempt($credentials)){
        
                $usuarioLogeado = Auth::User();
        
                $token= $usuarioLogeado->createToken('TokenUsuario')->plainTextToken;
                
                return ['token' => $token];
            }else{
               return ['Error' => 'Nombre o contraseña no válidos'];
         }
    }




    // public function register(Request $request){

    // }

}
