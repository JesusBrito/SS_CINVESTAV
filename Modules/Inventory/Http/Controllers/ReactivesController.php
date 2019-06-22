<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Inventory\Entities\Reactive as Reactive;

class ReactivesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        $reactives= Reactive::all();
        return view('inventory::reactivos.listarReactivos',compact('reactives'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('inventory::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $reactive= new Reactive;
        $reactive->idTipoReactivo = $request->idTipoReactivo;
        $reactive->idTemperatura = $request->idTemperatura;
        $reactive->idToxicidad = $request->idToxicidad;
        $reactive->nombreEspañol = $request->nombreEspañol;
        $reactive->nombreIngles = $request->nombreIngles;
        $reactive->puntoReorden = $request->puntoReorden;
        $reactive->manejo = $request->manejo;
        $reactive->totalExistencia = $request->totalExistencia;

        if($reactive->save()){
            alert()->success('El registro se agregó correctamente', 'OK')->autoclose(2500);
        }else{
            alert()->error('Error al agregar el registro', 'Error')->autoclose(2500);
        }
        return view('inventory::reactivos.formularioReactivo');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $reactive = Reactive::find($id);
        return view('inventory::reactivos.formularioReactivo',compact('reactive'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('inventory::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $reactive = Reactive::find($id);

        $reactive->idTipoReactivo = $request->idTipoReactivo;
        $reactive->idTemperatura = $request->idTemperatura;
        $reactive->idToxicidad = $request->idToxicidad;
        $reactive->nombreEspañol = $request->nombreEspañol;
        $reactive->nombreIngles = $request->nombreIngles;
        $reactive->puntoReorden = $request->puntoReorden;
        $reactive->manejo = $request->manejo;
        $reactive->totalExistencia = $request->totalExistencia;

        if($reactive->save()){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        if(Reactive::destroy($id)){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }

    public function changeStatus(Request $request)
    {
        $reactive = Reactive::find($request->id);
        if($reactive->estado==1){
            $reactive->estado = 0;
        }else{
            $reactive->estado = 1;
        }

        if($reactive->save()){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }
}
