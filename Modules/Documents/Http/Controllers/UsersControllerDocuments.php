<?php

namespace Modules\Documents\Http\Controllers;

use Illuminate\Http\Request;
use App\{ User, Level, UserType };
use Illuminate\Routing\Controller;


class UsersControllerDocuments extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();

        return view('documents::usuarios.listarUsuarios', compact('users'));
    }


    /**
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $user = null;
        $action = route('usersInventory.store');
        $userTypes = UserType::all();
        $levels = Level::all();
        return view('documents::usuarios.crearEditarUsuario', compact('user', 'action', 'userTypes', 'levels'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
    }

    /**
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('documents::usuarios.mostrarUsuario', compact('user'));
    }

    /**
     * @param  User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        $userTypes = UserType::all();
        $action = route('usersInventory.update', $user);
        $levels = Level::all();
        return view('documents::usuarios.crearEditarUsuario', compact('user', 'action', 'userTypes', 'levels'));
    }

  /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
  public function update(Request $request, User $user)
  {
    $user->update($request->all());
    if ($request->hasFile('imagen')) {
      $user->imagen = $request->file('imagen')->store('profile');
    }
    if ($user->save()) {
      alert()->success('Usuario modificado correctamente', 'OK')->autoclose(2500);
      return redirect(route('users.show', $user));
    } else {
      alert()->error('Error al modificar los campos', 'Error')->autoclose(2500);
      return back();
    }
  }
  /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
  public function destroy(User $user)
  {
    //
  }
}
