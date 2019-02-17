<?php

namespace Modules\Documents\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;
use Modules\Documents\Entities\Level as Level;
use Modules\Documents\Entities\LevelDetail as LevelDetail;

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
        $detailLevels= $usuario->detailLevel();
        $levels= Level::all();
        return view('documents::users.edit',["usuario"=>$usuario,"detailLevels"=>$detailLevels,"levels"=>$levels]);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $usuario= User::find($id);
        $usuario->Correo=$request->Correo;
        if($request->hasFile('Imagen')){
            $usuario->Imagen=$request->file('Imagen')->store('public/profile_pictures');
        }
        $usuario->Nombre=$request->Nombre;
        $usuario->A_Paterno=$request->A_Paterno;
        $usuario->A_Materno=$request->A_Materno;
        $usuario->Celular=$request->Celular;
        $usuario->FechaNac=$request->FechaNac;
        $usuario->Sexo=$request->Sexo;

        if($usuario->save()){
            alert()->success('Usuario modificado correctamente', 'OK')->autoclose(2500);
            return redirect('/documents/usuarios/show');
        }else{
            alert()->error('Error al modificar los campos', 'Error')->autoclose(2500);
            return view('documents::users.edit',["usuario"=>$usuario]);
        }
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }


    //AJAX
    public function saveDetailLevel(Request $request, $id){

    }
}
