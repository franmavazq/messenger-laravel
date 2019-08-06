@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">

            <b-card title="Inicio de Sesión"
                class="my-3">

                @if($errors->any())
                    <b-alert show variant="danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </b-alert>
                @else
                    <b-alert show>
                        Default Alert
                    </b-alert>
                @endif
                
                <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf
                    <b-form-group
                        label="Correo electrónico:" 
                        label-for="email">
                        <b-form-input id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required autofocus 
                            placeholder="ejemplo@email.com">
                        </b-form-input>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </b-form-group>

                    <b-form-group
                        label="Contraseña:" 
                        label-for="password">
                        <b-form-input id="password" 
                        type="password" 
                        name="password"
                        required>
                        </b-form-input>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </b-form-group>

                    <b-form-group>
                        <b-form-checkbox name="remember"
                        {{ old('remember') ? 'checked="true"' : '' }}>
                        Recordar sesion
                        </b-form-checkbox>
                    </b-form-group>

                        <b-button type="submit" variant="primary">Ingresar</b-button>
                        <b-button href="{{ route('password.request') }}" variant="link" >¿Olvidaste tu contraseña?</b-button>

                </form>

            </b-card>

        </b-col>
    </b-row>
</b-container>


@endsection
