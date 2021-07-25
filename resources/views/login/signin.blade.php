@extends('login.master')
@section('title')
    Inicio Sesión
@endsection

@section('body')

    <div class="card centerf">
        @if(Session::has('message'))
            <div class=" mt-3 mb-3 alert alert-{{ Session::get('typealert')}}"  style="margin-top: -16px;">
            {{ Session::get('message')}}
            </div>
        @endif 
        <form action="/signin" method="post" class="rounded box">
            @csrf
            <h1>Inicio de Sesión</h1>

            <p class="text-muted"> Ingrese su correo y contraseña</p> 

            <input type="text" name="email" placeholder="Correo" required> 
            @if ($errors->has('email'))
                <div class="alert alert-danger mtop16">    
                    <p>{{ $errors->first('email') }}</p>         
                </div>
            @endif

            <input type="password" name="password" placeholder="Contraseña" required> 
            @if ($errors->has('password'))
                <div class="alert alert-danger mtop16">    
                    <p>{{ $errors->first('password') }}</p>         
                </div>
            @endif

            <div class="form-check text-left my-3">
                <input name="remember" class="form-check-input" type="checkbox" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                    Permanecer conectado
                </label>
            </div>

            <input type="submit" name="" value="Iniciar sesión" >

            <a class="forgot text-muted" href="#">Olvido su contraseña?</a> 

            

        </form>
        <a class=" my-4 forgot text-monospace" href="/signup">¿No tiene usuario? Registrese</a>
    </div>
    
@endsection