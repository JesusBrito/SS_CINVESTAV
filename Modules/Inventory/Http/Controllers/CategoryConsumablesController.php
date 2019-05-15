<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Inventory\Entities\CategoryConsumable as CategoryConsumable;

class CategoryConsumablesController extends Controller
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
        return view('inventory::categoriasConsumible.listarCategoriasConsumible',compact('categoriesConsumable'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('inventory::categoriasConsumible.agregarCategoriaConsumible');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $categoryConsumable= new CategoryConsumable;
        $categoryConsumable->categoria = $request->txtCategoriaConsumible;
        $categoryConsumable->estado = 1;
        if($categoryConsumable->save()){
            alert()->success('El registro se agregó correctamente', 'OK')->autoclose(2500);
        }else{
            alert()->error('Error al agregar el registro', 'Error')->autoclose(2500);
        }
        return view('inventory::categoriasConsumible.agregarCategoriaConsumible');
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
        $categoryConsumable = CategoryConsumable::find($id);
        $categoryConsumable->categoria = $request->txtCategoria;

        if($categoryConsumable->save()){
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
        if(CategoryConsumable::destroy($id)){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }

    public function changeStatus(Request $request)
    {
        $categoryConsumable = CategoryConsumable::find($request->txtIdCategoria);
        if($categoryConsumable->estado==1){
            $categoryConsumable->estado = 0;
        }else{
            $categoryConsumable->estado = 1;
        }

        if($categoryConsumable->save()){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }
}
