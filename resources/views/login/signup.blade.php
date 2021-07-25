@extends('master')
@section('title')
    Registrarse
@endsection

@section('body')
    <div class="card centerf">
        <form action="/" method="post" class="rounded box">
            
            <h1>Registro</h1>

            <p class="text-muted">Complete el siguiente formulario</p> 

            <input type="text" name="" placeholder="Nombre"> 

            <input type="text" name="" placeholder="Apellido"> 

            <input type="text" name="" placeholder="Correo"> 

            <input type="password" name="" placeholder="Contraseña"> 

            <input type="password" name="" placeholder="Repita la contraseña"> 

            <input type="submit" name="" value="Registrarme" >

            <a class="forgot text-muted" href="/signin">¡Ya tengo cuenta! Iniciar sesión</a>

        </form>
    </div>
@endsection