<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;

class EstudiantesController extends Controller
{
    
    
    public function index(){
        $estudiantes = Estudiante::all();
        return $estudiantes;
    }
    

    public function show($id){
    
        //Buscar estudiante con el id
        $estudiante = Estudiante::find($id);
        if(!$estudiante){
            return['error' => 'Estudiante no encontrado'];
        }
        return['datos' => $estudiante];
    }


    public function store(Request $request){        
        // Validar
        $datos_validados = $request->validate([
            'name' => 'required',
            'email' => 'min:8',
            'foto' => 'required'
        ]);

        // Crear
        Estudiante::create($datos_validados);
        return['mensaje' => 'Usuario creado'];
    }


    
    public function update($id, Request $request){

        //Buscar estudiante con el id
        $estudiante = Estudiante::find($id);

        //Comprobar si el estudiante existe
        if(!$estudiante){
            return['error' => 'Estudiante no encontrado'];
        }
        $datos_validados = $request->validate([
            'name' => 'min:3',
            'email' => 'min:8',
        ]);
        $estudiante->update($datos_validados);

        return ['mensaje' => 'Estudiante Actualizado'];

    }


    public function destroy($id) {

    //Buscar estudiante con el id
    $estudiante = Estudiante::find($id);

    //Comprobar si el estudiante existe
    if(!$estudiante){
         return['error' => 'Estudiante no encontrado'];
     }

    //Borrar estudiante con el id      
    $estudiante->destroy($id);
    }
}
