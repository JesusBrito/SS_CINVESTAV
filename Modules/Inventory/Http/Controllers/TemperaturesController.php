<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Inventory\Entities\Temperature as Temperature;
use Modules\Inventory\Entities\Unity as Unity;


class TemperaturesController extends Controller
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
        $temperatures= Temperature::all();
        $unities= Unity::all();
        return view('inventory::temperaturas.listarTemperaturas',compact('temperatures', 'unities'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $unities= Unity::all();
        return view('inventory::temperaturas.agregarTemperatura',compact('unities'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $temperature= new Temperature;
        $temperature->temperatura = $request->txtTemperatura;
        $temperature->idUnidad = $request->txtUnidad;
        if($temperature->save()){
            alert()->success('El registro se agregó correctamente', 'OK')->autoclose(2500);
        }else{
            alert()->error('Error al agregar el registro', 'Error')->autoclose(2500);
        }
        $unities= Unity::all();
        return view('inventory::temperaturas.agregarTemperatura',compact('unities'));
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
        $temperature = Temperature::find($id);
        $temperature->temperatura = $request->txtTemperatura;
        $temperature->idUnidad = $request->txtUnidad;
        if($temperature->save()){
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
        if(Temperature::destroy($id)){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }

    public function changeStatus(Request $request)
    {
        $temperature = Temperature::find($request->txtIdTemperatura);
        if($temperature->estado==1){
            $temperature->estado = 0;
        }else{
            $temperature->estado = 1;
        }

        if($temperature->save()){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }
}