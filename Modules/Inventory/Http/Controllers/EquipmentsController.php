<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Inventory\Entities\Equipment as Equipment;

class EquipmentsController extends Controller
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
        $equipos= Equipment::all();
        return view('inventory::equipos.listarEquipos',compact('equipos'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('inventory::equipos.agregarEquipo');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $equipo = new Equipment;
        $equipo->nombre = $request->txtNombre;
        $equipo->descripcion = $request->txtDescripcion;
        $equipo->existencia = $request->txtExistencia;
        if($equipo->save()){
            alert()->success('El registro se agregó correctamente', 'OK')->autoclose(2500);
        }else{
            alert()->error('Error al agregar el registro', 'Error')->autoclose(2500);
        }

        return view('inventory::equipos.agregarEquipo');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('inventory::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('inventory::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $equipo = Equipment::find($id);
        $equipo->nombre = $request->txtNombre;
        $equipo->descripcion = $request->txtDescripcion;
        $equipo->existencia = $request->txtExistencia;

        if($equipo->save()){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy($id)
    {
        if(Equipment::destroy($id)){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }

    public function changeStatus(Request $request)
    {
        $equipo = Equipment::find($request->txtIdConsumible);
        if($equipo->estado==1){
            $equipo->estado = 0;
        }else{
            $equipo->estado = 1;
        }

        if($equipo->save()){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }
}
