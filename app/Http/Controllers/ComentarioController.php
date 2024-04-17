<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ComentarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
        // ->only()
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $comentarios = Comentario::where('user_id', Auth::id())->get();
        // $comentarios = Auth::user()->comentarios()
        //     ->where('nombre', 'like', '%2')
        //     ->get();

        //$comentarios = Auth::user()->comentarios; //solo da los comentario del usuario logeado
        $comentarios = Comentario::all();

        return view('comentarios/comentarioIndex', compact('comentarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comentarios.comentarioCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar
        $request->validate([
            'nombre' => 'required|max:255',
            'correo' => ['required', 'email', 'max:255'],
            'comentario' =>[ 'required', 'min:10'],
            'ciudad' => 'required',
        ]);

        $request->merge(['user_id' => Auth::id()]);
        $comentario = Comentario::create($request->all());

        if( $request->file('archivo')->isValid()) {
            //para guaradar con su nombre original $request->file('archivo')->storeAs('archivos_comentarios');

            $comentario->archivos()->create([
                'ubicacion' => $request->archivo->store('archivos_comentarios', 'public'),
                'nombre_original' => $request->archivo->getClientOriginalName(),
                'mime' => $request->file('archivo')->getClientMimeType(),
            ]);
        }

        // Redireccionar
        return redirect()->route('comentario.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comentario $comentario)
    {
        return view('comentarios.comentarioShow', compact('comentario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        // if (! Gate::allows('editar-comentario', $comentario)) {
        //     abort(403);
        // }
        //misma funcion solo mas corto
        //Gate::authorize('editar-comentario', $comentario); 
        $this->authorize('update', $comentario);

        return view('comentarios.comentarioEdit', compact('comentario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        $this->authorize('update', $comentario);
        $request->validate([
            'nombre' => 'required|max:255',
            'correo' => ['required', 'email', 'max:255'],
            'comentario' =>[ 'required', 'min:10'],
            'ciudad' => 'required',
        ]);
        
        // $comentario->nombre = $request->nombre;
        // $comentario->correo = $request->correo;
        // $comentario->comentario = $request->comentario;
        // $comentario->ciudad = $request->ciudad;
        // $comentario->save();

        $comentario->update($request->all());

        return redirect()->route('comentario.show', $comentario);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        $this->authorize('delete', $comentario);
        $comentario->delete();
        return redirect()->route('comentario.index');
    }

    public function download(Archivo $archivo)
    {
        //Storage::delete(storage_path('app/public/' . $archivo->ubicacion));

        return redirect()->back();

        return response()
        ->download(storage_path('app/public/' . $archivo->ubicacion), $archivo->nombre_original);
    }
}
