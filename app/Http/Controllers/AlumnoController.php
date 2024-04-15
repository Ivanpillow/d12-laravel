<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.listado', compact('alumnos'));
            //->with('alumnos', Alumno::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        //
    }

    public function agendarMateria(Alumno $alumno)
    {
        return view('alumnos.agendar-materia', compact('alumno'))
            ->with('materias', Materia::all());
    }

    public function relacionarMateriaConAlumno (Request $request, Alumno $alumno)
    {
        $materia_id = $request->materia_id;
        $alumno_id = $alumno->id;

        $alumno->materias()->sync($materia_id);

        Mail::to($request->user())->send(new OrderShipped($order));

        return redirect()->route('alumno.show', $alumno_id);
    }

}
