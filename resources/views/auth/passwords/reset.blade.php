@extends('layout')

@section('contenido')
<div class="content-wrapper">
    <div class="content container-fluid ">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border content-header">
                    <h3 >{{ __('Reestablece tu Contraseña') }}</h3> Llene los siguientes campos
                
                </div>

                    <div class="box-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row ">
                                <label for="Correo" class="col-md-4 col-form-label text-md-right">{{ __('Correo eléctronico') }}</label>

                                <div class="col-md-6">
                                    <input id="Correo" type="Correo" class="form-control{{ $errors->has('Correo') ? ' is-invalid' : '' }}" name="Correo" value="{{ $Correo ?? old('Correo') }}" required autofocus>

                                    @if ($errors->has('Correo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('Correo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirma la Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reestablecer Contraseña') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
