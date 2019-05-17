<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Inventory\Entities\BrandCompany as BrandCompany;

class BrandsController extends Controller
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
        $brands= BrandCompany::all();
        return view('inventory::marcas.listarMarcas',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('inventory::marcas.agregarMarca');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $brandCompany= new BrandCompany;
        $brandCompany->nombre = $request->txtMarca;
        if($brandCompany->save()){
            alert()->success('El registro se agregó correctamente', 'OK')->autoclose(2500);
        }else{
            alert()->error('Error al agregar el registro', 'Error')->autoclose(2500);
        }
        return view('inventory::marcas.agregarMarca');
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
        $brandCompany = BrandCompany::find($id);
        $brandCompany->nombre = $request->txtMarca;
        if($brandCompany->save()){
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
        if(BrandCompany::destroy($id)){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }

    public function changeStatus(Request $request)
    {
        $brandCompany = BrandCompany::find($request->txtIdMarca);
        if($brandCompany->estado==1){
            $brandCompany->estado = 0;
        }else{
            $brandCompany->estado = 1;
        }

        if($brandCompany->save()){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }
}
