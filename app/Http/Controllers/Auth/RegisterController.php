<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'usuarios';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

        ]);
    }
    public function showRegistrationForm()
    {
        return view('usuarios.create');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data->file('Imagen')->store('public/profile_pictures');
                return User::create([
            'Correo'=>$data['Correo'],
            'password'=>Hash::make($data['password']),
            'Imagen'=>$data['Imagen'],
            'Nombre'=>$data['Nombre'],
            'A_Paterno'=>$data['A_Paterno'],
            'A_Materno'=>$data['A_Materno'],
            'Tipo_Usuario'=>$data['Tipo_Usuario'],
            'Celular'=>$data['Celular'],
            'FechaNac'=>$data['FechaNac'],
            'Sexo'=>$data['Sexo'],
        ]);

    }
}
