<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Inventory\Entities\Unity as Unity;

class UnitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function __construct()
    {
       $this->middleware('auth');//Entregable 10: agregar rol de administrador
    }
    
    public function index()
    {
        $unities= Unity::all();
        return view('inventory::unidades.listarUnidades',compact('unities'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('inventory::unidades.agregarUnidad');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $unity= new Unity;
        $unity->nombreLargo = $request->txtNombreLargo;
        $unity->nombreCorto = $request->txtNombreCorto;
        if($unity->save()){
            alert()->success('El registro se agregó correctamente', 'OK')->autoclose(2500);
        }else{
            alert()->error('Error al agregar el registro', 'Error')->autoclose(2500);
        }
        return view('inventory::unidades.agregarUnidad');
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
        $unity = Unity::find($id);
        $unity->nombreLargo = $request->txtNombreLargo;
        $unity->nombreCorto = $request->txtNombreCorto;

        if($unity->save()){
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
        if(Unity::destroy($id)){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }

    public function changeStatus(Request $request)
    {
        $unity = Unity::find($request->txtIdUnidad);
        if($unity->estado==1){
            $unity->estado = 0;
        }else{
            $unity->estado = 1;
        }

        if($unity->save()){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }
}
