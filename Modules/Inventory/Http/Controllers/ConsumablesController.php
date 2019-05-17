<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Inventory\Entities\Consumable as Consumable;
use Modules\Inventory\Entities\CategoryConsumable as CategoryConsumable;

class ConsumablesController extends Controller
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
        $categoriesConsumable= CategoryConsumable::all();
        $consumables= Consumable::all();
        return view('inventory::consumibles.listarConsumibles',compact('consumables','categoriesConsumable'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        $categoriesConsumable= CategoryConsumable::all();
        return view('inventory::consumibles.agregarConsumible',compact('categoriesConsumable'));
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $consumable = new Consumable;
        $consumable->nombreConsumible = $request->txtNombre;
        $consumable->idCategoria = $request->txtCategoria;
        $consumable->existencia = $request->txtExistencia;
        $consumable->puntoReorden = $request->txtExistenciaMinima;
        $consumable->descripcion = $request->txtDescripcion;
        if($consumable->save()){
            alert()->success('El registro se agregó correctamente', 'OK')->autoclose(2500);
        }else{
            alert()->error('Error al agregar el registro', 'Error')->autoclose(2500);
        }
        $categoriesConsumable= CategoryConsumable::all();
        return view('inventory::consumibles.agregarConsumible',compact('categoriesConsumable'));
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
        $consumable = Consumable::find($id);
        $consumable->nombreConsumible = $request->txtConsumible;
        $consumable->idCategoria = $request->txtCategoria;
        $consumable->existencia = $request->txtExistencia;
        $consumable->puntoReorden = $request->txtExistenciaMinima;
        $consumable->descripcion = $request->txtDescripcion;

        if($consumable->save()){
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
        if(Consumable::destroy($id)){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }

    public function changeStatus(Request $request)
    {
        $consumable = Consumable::find($request->txtIdConsumible);
        if($consumable->estado==1){
            $consumable->estado = 0;
        }else{
            $consumable->estado = 1;
        }

        if($consumable->save()){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }

}
