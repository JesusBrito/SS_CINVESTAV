<?php

namespace Modules\Documents\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\User;
use Modules\Documents\Entities\Level as Level;
use Modules\Documents\Entities\LevelDetail as LevelDetail;

use Response;

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
    public function edit(User $usuario)
    {
        // $usuario= User::find($id);
        $detailLevels= $usuario->detailLevel();
        $levels= Level::all();
        return view('documents::users.edit',["usuario"=>$usuario,"detailLevels"=>$detailLevels,"levels"=>$levels]);
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request, User $usuario)
    {
        // $usuario= User::find($id);
        $usuario->email=$request->email;
        if($request->hasFile('imagen')){
            $usuario->imagen=$request->file('imagen')->store('profile_pictures');
        }
        $usuario->nombre=$request->nombre;
        $usuario->a_paterno=$request->a_paterno;
        $usuario->a_materno=$request->a_materno;
        $usuario->celular=$request->celular;
        $usuario->fecha_nacimiento=$request->fecha_nacimiento;
        $usuario->sexo=$request->sexo;

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
    public function saveDetailLevel(Request $request){

        $detailLevel = new LevelDetail;
        $detailLevel->id_usuario=$request->id_usuario;
        $detailLevel->id_nivel=$request->id_nivel;
        $detailLevel->carrera=$request->carrera;
        $detailLevel->escuela=$request->escuela;
        $detailLevel->ingreso=$request->ingreso;
        $detailLevel->egreso=$request->egreso;
        $detailLevel->estatus=$request->estatus;

        if($detailLevel->save()){
            return response()->json(array('success' => true, 'responseId' => $detailLevel->id), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }

    public function deleteDetailLevel(Request $request, $id){
        if(LevelDetail::destroy($id)){
            return response()->json(array('success' => true), 200);
        }else{
            return Response::json("{message:'Error'}");
        }
    }

}
