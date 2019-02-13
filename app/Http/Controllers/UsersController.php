<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $options=[
            'Correo'=>$request->txtNombre,
            'Clave'=>$request->txtpassword1,
            'Imagen'=>$request->flfoto,
            'Nombre'=>$request->txtNombre,
            'A_Paterno'=>$request->txtappat,
            'A_Materno'=>$request->txtapmat,
            'Tipo_Usuario'=>$request->slTipoUsuario,
            'Celular'=>$request->txtnumero,
            'Permisos'=>"1234456",
            'FechaNac'=>date("Y-m-d", strtotime($request->txtfecha)),
            'Sexo'=>$request->slsexo,
            'Estatus'=>1
        ];

        if(User::create($options)){
            return view('users.index');
        }else{
            return view('users.create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
