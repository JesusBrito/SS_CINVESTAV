<?php

namespace Modules\Documents\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;
use DetailLevel;

class UsersControllerDocuments extends Controller
{
     public function __construct()
    {
       $this->middleware('auth');//Entregable 10: agregar rol de administrador
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('documents::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('documents::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('documents::users.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit($id)
    {
        $usuario= User::find($id);
        return view('documents::users.edit',["usuario"=>$usuario]);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
            $usuario= User::find($id);
            $request->file('Imagen')->store('public/profile_pictures');
            $options=[
                'Correo'=>$request->Correo,
                'Imagen'=>$request->Imagen,
                'Nombre'=>$request->Nombre,
                'A_Paterno'=>$request->A_Paterno,
                'A_Materno'=>$request->A_Materno,
                'Celular'=>$request->Celular,
                'FechaNac'=>$request->FechaNac,
                'Sexo'=>$request->Sexo,
            ];

    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
