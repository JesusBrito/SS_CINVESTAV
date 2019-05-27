<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Modules\Documents\Entities\Level;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $usuario)
    {
        return view('usuarios.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $usuario)
    {
        $niveles = Level::all();
        return view('usuarios.edit', compact('usuario', 'niveles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $usuario)
    {
        $usuario->update($request->all());

        if ($request->hasFile('imagen')) {
            $usuario->imagen = $request->file('imagen')->store('profile');
        }

        if ($usuario->save()) {
            alert()->success('Usuario modificado correctamente', 'OK')->autoclose(2500);
            return redirect(route('usuarios.show', $usuario));
        } else {
            alert()->error('Error al modificar los campos', 'Error')->autoclose(2500);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $usuario)
    {
        //
    }

    public function guardarDetalle()
    {
        $detalleNiveles = new LevelDetail;
        $detalleNiveles->id_usuario = $request->id_usuario;
        $detalleNiveles->id_nivel = $request->id_nivel;
        $detalleNiveles->carrera = $request->carrera;
        $detalleNiveles->escuela = $request->escuela;
        $detalleNiveles->ingreso = $request->ingreso;
        $detalleNiveles->egreso = $request->egreso;
        $detalleNiveles->estatus = $request->estatus;

        if ($detalleNiveles->save()) {
            return response()->json(array('success' => true, 'responseId' => $detalleNiveles->id), 200);
        } else {
            return Response::json("{message:'Error'}");
        }
    }

    public function eliminarDetalle()
    {
        if (LevelDetail::destroy($id)) {
            return response()->json(array('success' => true), 200);
        } else {
            return Response::json("{message:'Error'}");
        }
    }
}
