@extends('master')

@section('title')
    Inicio
@endsection

@section('body')

    <div class="preview-cards">
        <div class="row">
            <div class="four col-md-3 col-12">
                <div class="counter-box colored green"> 
                    <i class="far fa-building"></i>
                    <span class="counter">100</span>
                    <p>Total Empresas</p>
                </div>
            </div>
            <div class="four col-md-3 col-12">
                <div class="counter-box colored green"> 
                    <i class="fas fa-users"></i>
                    <span class="counter">100</span>
                    <p>Total empleados</p>
                </div>
            </div>
            <div class="four col-md-3 col-12">
                <div class="counter-box colored green"> 
                    <i class="fas fa-users"></i>
                    <span class="counter">100</span>
                    <p>Usuarios registrados</p>
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="head">
            <div class="title">
                Dashboard
            </div>
        </div>
        <div class="inside">
            esto es dashboard
        </div>
    </div>

@endsection