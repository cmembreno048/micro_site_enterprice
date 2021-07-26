@extends('login.master')
@section('title')
    Registrarse
@endsection

@section('body')
    <div class="card centerf">
        <form action="/signup" method="post" class="rounded box">
            @csrf
            <h1>Registro</h1>

            <p class="text-muted">Complete el siguiente formulario</p> 

            <input type="text" name="name" placeholder="Nombre"> 
            @if ($errors->has('name'))
                <div class="alert alert-danger mtop16">    
                    <p>{{ $errors->first('name') }}</p>         
                </div>
            @endif

            <input type="text" name="last_name" placeholder="Apellido"> 
            @if ($errors->has('last_name'))
                <div class="alert alert-danger mtop16">    
                    <p>{{ $errors->first('last_name') }}</p>         
                </div>
            @endif

            <input type="text" name="email" placeholder="Correo"> 
            @if ($errors->has('email'))
                <div class="alert alert-danger mtop16">    
                    <p>{{ $errors->first('email') }}</p>         
                </div>
            @endif

            <input type="password" name="password" placeholder="Contraseña"> 
            @if ($errors->has('password'))
                <div class="alert alert-danger mtop16">    
                    <p>{{ $errors->first('password') }}</p>         
                </div>
            @endif

            <input type="password" name="conf_password" placeholder="Repita la contraseña"> 
            @if ($errors->has('conf_password'))
                <div class="alert alert-danger mtop16">    
                    <p>{{ $errors->first('conf_password') }}</p>         
                </div>
            @endif

            <input type="submit" value="Registrarme" >

            <a class="forgot text-muted" href="/signin">¡Ya tengo cuenta! Iniciar sesión</a>

        </form>
    </div>
@endsection