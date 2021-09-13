<?php

namespace App\Http\Controllers;

use App\Models\User;
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
                
                return [
                    'Mensaje' => 'Logeado Correctamente',
                    'Usuario' => $usuarioLogeado,
                    'token' => $token];
            }else{
               return ['Error' => 'Nombre o contraseña no válidos'];
         }
    }




     public function register(Request $request){

        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);

        //Encriptar contraseña.
        $credentials['password'] = bcrypt($credentials['password']);

        //Crear nuevo usuario.
        $usuarioNuevo = User::create($credentials);

        //Crear el token para el nuevo usuario.
        $token = $usuarioNuevo->createToken('TokenUsuario')->plainTextToken;

        //Respuesta final.
        return [
            'mensaje' => 'Usuario creado correctamente',
            'usuario' => $usuarioNuevo,
            'token' => $token
        ];
    }



     public function logout(Request $request){

        //Usuario logeado -> logout.
        $usuarioLogeado = Auth::User()->tokens()->delete();


        //Respuesta final.
        return [
            'mensaje' => 'Desconectado correctamente',
            'usuario' => $usuarioLogeado,
        ];
    }

}
