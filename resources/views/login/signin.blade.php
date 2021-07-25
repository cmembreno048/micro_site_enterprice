@extends('master')
@section('title')
    Inicio Sesión
@endsection

@section('body')

    <div class="card centerf">
        <form action="/" method="post" class="rounded box">

            <h1>Inicio de Sesión</h1>

            <p class="text-muted"> Ingrese su correo y contraseña</p> 

            <input type="text" name="" placeholder="Correo"> 

            <input type="password" name="" placeholder="Contraseña"> 

            <a class="forgot text-muted" href="#">Olvido su contraseña?</a> 

            <input type="submit" name="" value="Iniciar sesión" >

            <a class="forgot text-muted" href="/signup">¿No tiene usuario? Registrese</a>

        </form>
    </div>

@endsection