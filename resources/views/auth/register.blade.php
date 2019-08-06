@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">

            <b-card title="Registro"
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

               <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                    @csrf
                    <b-form-group
                        label="Nombre:" 
                        label-for="name">
                        <b-form-input id="name" 
                            type="text" 
                            name="name" 
                            value="{{ old('name') }}" 
                            required autofocus >
                        </b-form-input>
                    </b-form-group>

                    <b-form-group
                        label="Correo electrónico:" 
                        label-for="email" 
                        description="Nunca compartiremos tu correo. Está seguro con nosotros.">
                        <b-form-input id="email" 
                            type="email" 
                            name="email"
                            required 
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
                        label-for="password" 
                        description="Agrega una contraseña no muy facil, ni muy difícil de recordar.">
                        <b-form-input id="password" 
                        type="password" 
                        name="password"  
                        required>
                        </b-form-input>
                    </b-form-group>

                    <b-form-group
                        label="Confirmar contraseña:" 
                        label-for="password_confirmation" 
                        description="Vuelve a confirmar tu contraseña.">
                        <b-form-input id="password_confirmation" 
                        type="password" 
                        name="password_confirmation" 
                        required>
                        </b-form-input>
                    </b-form-group>

                        <b-button type="submit" variant="primary">Confirmar registro</b-button>
                        <b-button href="{{ route('login') }}" variant="link" >¿Ya te has registrado?</b-button>

                </form>
                
            </b-card>

        </b-col>
    </b-row>
</b-container>
@endsection
