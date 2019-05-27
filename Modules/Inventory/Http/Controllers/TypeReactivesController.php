<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Inventory\Entities\TypeReactive as TypeReactive;

class TypeReactivesController extends Controller
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
        $typeReactives= TypeReactive::all();
        return view('inventory::tipoReactivos.listarTipoReactivo',compact('typeReactives'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('inventory::tipoReactivos.agregarTipoReactivo');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $typeReactive= new TypeReactive;
        $typeReactive->tipo = $request->txtTypeReactive;
        if($typeReactive->save()){
            alert()->success('El registro se agregó correctamente', 'OK')->autoclose(2500);
        }else{
            alert()->error('Error al agregar el registro', 'Error')->autoclose(2500);
        }
        return view('inventory::tipoReactivos.agregarTipoReactivo');
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
        $typeReactive = TypeReactive::find($id);
        $typeReactive->tipo = $request->txtTipoReactivo;

        if($typeReactive->save()){
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
        if(TypeReactive::destroy($id)){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }

    public function changeStatus(Request $request)
    {
        $typeReactive = TypeReactive::find($request->txtIdTipoReactivo);
        if($typeReactive->estado==1){
            $typeReactive->estado = 0;
        }else{
            $typeReactive->estado = 1;
        }

        if($typeReactive->save()){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }
}
