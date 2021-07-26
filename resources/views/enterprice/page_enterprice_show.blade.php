@extends('master')

@section('title')
    Empresas
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a >Empresas</a></li>
@endsection

@section('body')

    <div class="panel">
        <div class="head">
            <div class="title">
                Empresas
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
                    <form action="{{url('/enterprice')}}" method="post" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <label for="name">Nombre de la empresa</label>
                            <input type="text" name="name" class="form-control" id="name" autocomplete="off" required>
                        </div>

                        @if ($errors->has('name'))
                            <div class="alert alert-danger mtop16">    
                                <p>{{ $errors->first('name') }}</p>         
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" name="email" class="form-control" id="email" autocomplete="off" >
                        </div>
                        @if ($errors->has('email'))
                            <div class="alert alert-danger mtop16">    
                                <p>{{ $errors->first('email') }}</p>         
                            </div>
                        @endif

                        <div class="form-group">
                            <label for="web_site">Sitio web</label>
                            <input type="text"name="web_site" class="form-control" id="web_site" autocomplete="off" >
                        </div>
                        @if ($errors->has('web_site'))
                            <div class="alert alert-danger mtop16">    
                                <p>{{ $errors->first('web_site') }}</p>         
                            </div>
                        @endif

                        <div class="custom-file my-3">
                            <input accept="image/*" type="file" name="image" class="custom-file-input" onchange="changeImage()">
                            <label class="custom-file-label"  for="customFile">Subir logotipo</label>
                          </div>
                          <small id="photoloaded" ></small>
                        @if ($errors->has('image'))
                            <div class="alert alert-danger mtop16">    
                                <p>{{ $errors->first('image') }}</p>         
                            </div>
                        @endif


                        <button class="w-100 btn btn-primary px-2 my-3" type="submit"> Agregar empresa</button>
                    </form>
                </div>

                <div class="col-lg-8 col-md-8 col-sm-8 col-12 my-3 column2">

                    <div class="d-flex justify-content-between">
                        <h5 class="my-2" >Empresas registradas</h5>
                        {{$enterprices->links()}}
                    </div>
                    
                    <div class="row">
                        @forelse ($enterprices as $enterprice)
                            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="card-enterprice my-5" >
                                    @if ($enterprice->image != null)
                                        <img src="{{Storage::url($enterprice->image)}}" alt="">
                                    @else
                                        <img src="{{Storage::url('public/src/img_test.jpg')}}" alt="">
                                    @endif
                                   <div class="data">
                                        <div class="name my-1">
                                            {{$enterprice->name}}
                                        </div>
                                        <div class="config d-flex">
                                            <a data-toggle="tooltip" data-placement="top" title="Editar empresa"  class="btn btn-success w-50 mx-1" href="{{url('/enterprice/edit/'.$enterprice->id)}}"><i class="fas fa-edit"></i></a>
                                            <a data-toggle="tooltip" data-placement="top" title="Eliminar empresa"  id="{{$enterprice->id}}" onclick="showModalDeleteJs(this.id, '/enterprice/delete/')" class="btn btn-danger w-50 mx-1" ><i class="fas fa-trash"></i></a>
                                        </div>
                                   </div>                                    
                                </div>
                            </div>
                        @empty
                            <p class="text-muted p-2 my-2">No hay empresas disponibles</p>
                        @endforelse
                    </div>

                    {{$enterprices->links()}}

                </div>
                
            </div>
        </div>
    </div>

    <section id="modal_delete" ></section>

@endsection