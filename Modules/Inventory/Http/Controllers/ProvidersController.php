<?php

namespace Modules\Inventory\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use Modules\Inventory\Entities\Provider as Provider;
use Modules\Inventory\Entities\ContactProvider as ContactProvider;

class ProvidersController extends Controller
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
        $providers= Provider::all();
        return view('inventory::proveedores.listarProveedores',compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('inventory::proveedores.agregarProveedor');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $cont = 0;
        $provider= new Provider;
        $provider->nombreEmpresa = $request->txtNombreEmpresa;
        $provider->calle = $request->txtCalle;
        $provider->colonia = $request->txtColonia;
        $provider->numExterior = $request->txtNumExterior;
        $provider->numInterior = $request->txtNumInterior;
        $provider->alcMun = $request->txtMunicipio;
        $provider->estadoRep = $request->txtEstado;
        $provider->cp = $request->txtCp;

        $listNombreContacto = $request->get('tableNombre');
        $listTelefonoContacto = $request->get('tableTelefono');
        $listEmailContacto = $request->get('tableEmail');

        if($provider->save()){
            while ($cont<count($listNombreContacto)) {
                $contactProvider= new ContactProvider;
                $contactProvider->nombre=$listNombreContacto[$cont];
                $contactProvider->telefono=$listTelefonoContacto[$cont];
                $contactProvider->email=$listEmailContacto[$cont];
                $contactProvider->idProveedor=$provider->id;
                $contactProvider->save();
                $cont++;
            }
            alert()->success('El registro se agregó correctamente', 'OK')->autoclose(2500);
        }else{
            alert()->error('Error al agregar el registro', 'Error')->autoclose(2500);
        }
        return view('inventory::proveedores.agregarProveedor');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $provider = Provider::find($id);
        return view('inventory::Proveedores.detalleProveedor',compact('provider'));
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
        $provider = Provider::find($id);
        $provider->nombreEmpresa = $request->nombreEmpresa;
        $provider->calle = $request->calle;
        $provider->colonia = $request->colonia;
        $provider->numExterior = $request->numExterior;
        $provider->numInterior = $request->numInterior;
        $provider->alcMun = $request->alcMun;
        $provider->estadoRep = $request->estadoRep;
        $provider->cp = $request->cp;
        if($provider->save()){
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
        if(Provider::destroy($id)){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }

    public function changeStatus(Request $request)
    {
        $provider = Provider::find($request->txtIdProveedor);
        if($provider->estado==1){
            $provider->estado = 0;
        }else{
            $provider->estado = 1;
        }

        if($provider->save()){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }
}
