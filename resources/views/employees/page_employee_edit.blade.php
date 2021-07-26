@extends('master')

@section('title')
    Colaboradores
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a >Colaboradores</a></li>
@endsection

@section('body')

    <div class="panel">
        <div class="head">
            <div class="title">
                Colaboradores
            </div>
        </div>
        <div class="inside">

            @if(Session::has('message'))
                <div class=" mt-3 mb-3 alert alert-{{ Session::get('typealert')}}"  style="margin-top: -16px;">
                {{ Session::get('message')}}
                </div>
            @endif 

            <div class="row fila">

                <div class="col-lg-4 col-md-4 col-sm-4 col-12 my-3 column1">

                    <a class="btn btn-primary w-100 my-5" href="{{url('/employees')}}"><i class="fas fa-plus"></i> Agregar nueva colaborador</a>

                    <form action="{{url('/employees/edit/'.$employee->id)}}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" class="form-control" value="{{$employee->name}}" id="name" autocomplete="off" required>
                        </div>

                        @if ($errors->has('name'))
                            <div class="alert alert-danger mtop16">    
                                <p>{{ $errors->first('name') }}</p>         
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="last_name">Apellido</label>
                            <input type="text" name="last_name" class="form-control" value="{{$employee->last_name}}" id="last_name" autocomplete="off"  required>
                        </div>
                        @if ($errors->has('last_name'))
                            <div class="alert alert-danger mtop16">    
                                <p>{{ $errors->first('last_name') }}</p>         
                            </div>
                        @endif

                        <select name="enterprice_id" class="custom-select my-3">
                            @foreach ($enterprices as $enterprice)
                                
                                <option @if($employee->enterprice_id == $enterprice->id) selected @endif value="{{$enterprice->id}}">{{$enterprice->name}}</option>
                                
                            @endforeach
                        </select>
                        @if ($errors->has('enterprice_id'))
                            <div class="alert alert-danger mtop16">    
                                <p>{{ $errors->first('enterprice_id') }}</p>         
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" name="email"  value="{{$employee->email}}" class="form-control" id="email" autocomplete="off" >
                        </div>

                        @if ($errors->has('email'))
                            <div class="alert alert-danger mtop16">    
                                <p>{{ $errors->first('email') }}</p>         
                            </div>
                        @endif


                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="text" name="phone" class="form-control"  value="{{$employee->phone}}" id="phone" autocomplete="off" >
                        </div>

                        @if ($errors->has('phone'))
                            <div class="alert alert-danger mtop16">    
                                <p>{{ $errors->first('phone') }}</p>         
                            </div>
                        @endif


                        <button class="w-100 btn btn-primary px-2 my-3" type="submit"> Actualizar Colaborador</button>
                    </form>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-8 col-12 my-3 column2">

                    <div class="d-flex justify-content-between">
                        <h5 class="my-2" >Colaboradores registrados</h5>
                        
                    </div>
                    <div style="overflow-x:auto;" >
                        <table class="table" >
                            <thead>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Empresa</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Configuración</th>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                <tr>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->last_name}}</td>
                                    <td>{{$employee->getEnterprice->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td class="d-flex" >
                                        <a data-toggle="tooltip" data-placement="top" title="Editar empresa"  class="btn btn-success mx-1" href="{{url('/employees/edit/'.$employee->id)}}"><i class="fas fa-edit"></i></a>
                                        <a data-toggle="tooltip" data-placement="top" title="Eliminar empresa"  id="{{$employee->id}}" onclick="showModalDeleteJs(this.id, '/employees/delete/')" class="btn btn-danger mx-1" ><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    

                </div>
                
            </div>
        </div>
    </div>

    <section id="modal_delete" ></section>

@endsection