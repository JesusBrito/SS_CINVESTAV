<?php

namespace App\Http\Controllers;

use App\User;
use App\Level;
use App\UserType;
use App\LevelDetail;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = null;
        $userTypes = UserType::all();
        $levels = Level::all();
        $action = route('users.store');
        return view('users.edit', compact('user', 'action', 'userTypes', 'levels'));
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $userTypes = UserType::all();
        $levels = Level::all();
        $action = route('users.update', $user);
        return view('users.edit', compact('user', 'action', 'userTypes', 'levels'));
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
