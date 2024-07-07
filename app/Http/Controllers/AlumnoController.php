<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nivel;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Aggregar variable para almacenar todos los datos dela clase Alumno
        $alumnos = Alumno::all();
        // retornar la vista al index alumnos
        return view('alumnos.index', ['alumnos'=> $alumnos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  Asignar a la variable nivles todos los valores (registros) del modelo Nivel
        $niveles = Nivel::all();
        // Retornos la vista a alumnos create
        return view('alumnos.create',['niveles' =>$niveles]);

        // Se puede Simplificar las dos lineas anteriores en una sola
        // return view('alumnos.create',['niveles' => Nivel::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Definir reglas para validaciones
        $request->validate([
            'matricula' => 'required|unique:alumnos|max:10',
            'nombre' => 'required|max:250',
            'fecha' => 'required|date',
            'telefono' => 'required|',
            'email' => 'nullable|email',
            'nivel' => 'required'

        ]);

        /* Despues de hacer la validacion, guardar el formulario en una nueva instancia
        llamada alumno */
        $alumno = new Alumno();
        $alumno->matricula = $request->input('matricula');
        $alumno->nombre = $request->input('nombre');
        $alumno->fecha_nacimiento = $request->input('fecha');
        $alumno->telefono =$request->input('telefono');
        $alumno->email = $request->input('email');
        $alumno->nivel_id = $request->input('nivel');
        $alumno->save();

        return view('alumnos.message', ['msg' => "Registro guardado con exito"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $alumno = Alumno::find($id);
        return view('alumnos.edit', ['alumno' => $alumno, 'niveles' => Nivel::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'matricula' => 'required|max:10|unique:alumnos,matricula,' .$id,
            'nombre' => 'required|max:250',
            'fecha' => 'required|date',
            'telefono' => 'required|',
            'email' => 'nullable|email',
            'nivel' => 'required'

        ]);

        /* Despues de hacer la validacion, guardar el formulario en una nueva instancia
        llamada alumno */
        $alumno = Alumno::find($id);
        $alumno->matricula = $request->input('matricula');
        $alumno->nombre = $request->input('nombre');
        $alumno->fecha_nacimiento = $request->input('fecha');
        $alumno->telefono =$request->input('telefono');
        $alumno->email = $request->input('email');
        $alumno->nivel_id = $request->input('nivel');
        $alumno->save();

        return view('alumnos.message', ['msg' => "Registro modificado con exito"]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $alumno = Alumno::find($id);
        $alumno->delete();

        return redirect("alumnos");
    }
}
