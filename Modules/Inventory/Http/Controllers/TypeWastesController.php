<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Inventory\Entities\TypeWaste as TypeWaste;

class TypeWastesController extends Controller
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
        $wastes= TypeWaste::all();
        return view('inventory::desechos.listarDesechos',compact('wastes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('inventory::desechos.agregarDesecho');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $typeWaste = new TypeWaste;
        $typeWaste->categoria = $request->txtCategoria;
        $typeWaste->tipo = $request->txtTipo;
        $typeWaste->recipiente = $request->txtRecipiente;
        $typeWaste->equipoSeguridad = $request->txtEquipoSeguridad;
        $typeWaste->procedimiento = $request->txtProcedimiento;
        $typeWaste->horario = $request->txtHorario;
        if($typeWaste->save()){
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
    public function update(Request $request)
    {
        $typeWaste = TypeWaste::find($id);
        $typeWaste->nombreConsumible = $request->txtConsumible;
        $typeWaste->idCategoria = $request->txtCategoria;
        $typeWaste->existencia = $request->txtExistencia;
        $typeWaste->puntoReorden = $request->txtExistenciaMinima;
        $typeWaste->descripcion = $request->txtDescripcion;

        if($typeWaste->save()){
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
        if(TypeWaste::destroy($id)){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }

    public function changeStatus(Request $request)
    {
        $typeWaste = TypeWaste::find($request->txtIdDesecho);
        if($typeWaste->estado==1){
            $typeWaste->estado = 0;
        }else{
            $typeWaste->estado = 1;
        }

        if($typeWaste->save()){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }

}
