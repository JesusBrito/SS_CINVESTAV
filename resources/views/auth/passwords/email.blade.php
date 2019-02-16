@extends('layout')

@section('contenido')
<div class="content-wrapper">
    
    <div class="content container-fluid ">
        <div class="row">
            <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border content-header">
                    <h3 >{{ __('Recupera tu Contraseña') }}</h3> Llene los siguientes campos
                
            </div>

                <div class="box-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group ">
                            <label for="email">{{ __('Correo electrónico') }}</label>

                            
                                <input id="Correo" placeholder="ejemplo@email.com" type="email" class="form-control {{ $errors->has('Correo') ? ' is-invalid' : '' }}" name="Correo" value="{{ old('Correo') }}" required>

                                @if ($errors->has('Correo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Correo') }}</strong>
                                    </span>
                                @endif
                            
                        </div>

                        <div class="form-group ">
                            <div class="box-footer ">
                                <button type="submit" class="btn btn-primary pull-left">
                                    {{ __('Envia link para reestablecer contraseña') }}
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
