@extends('master')

@section('title')
    Inicio
@endsection

@section('body')

    <div class="preview-cards">
        <div class="row">
            <div class="four col-md-3 col-12">
                <a href="{{url('/enterprice')}}">
                    <div class="counter-box colored green"> 
                        <i class="far fa-building"></i>
                        <span class="counter">{{$countEnterprice}}</span>
                        <p>Total Empresas</p>
                    </div>
                </a>
            </div>
            <div class="four col-md-3 col-12">
                <a href="{{url('/employees')}}">
                    <div class="counter-box colored green"> 
                        <i class="fas fa-users"></i>
                        <span class="counter">{{$countEmployees}}</span>
                        <p>Total empleados</p>
                    </div>
                </a>
            </div>
            <div class="four col-md-3 col-12">
                <a>
                    <div class="counter-box colored green"> 
                        <i class="fas fa-users"></i>
                        <span class="counter">{{$countUsers}}</span>
                        <p>Usuarios registrados</p>
                    </div>
                </a>
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
        </div>
    </div>

@endsection