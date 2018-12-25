@extends('layouts.admin')
@section('content')
{!! Form::open(['route' => 'send', 'method' => 'post']) !!}
<section class="card">
    <header class="card-header">
        <div class="card-actions">
            <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
            <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
        </div>
        <h2 class="card-title">CONFIGURACIÓN PARA ENVIO DE EMAIL</h2>
    </header>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                {!! Field::select('tipo',$tipo,null,['empty'=>'Seleccionar']) !!}
            </div>
            <div class="col-md-6">
                {!! Field::number('campo',null,['placeholder'=>'Campo email','label'=>'Ingrese el numero de campo donde se encuentra el email']) !!}
            </div>
            <div class="col-md-12">
                {!! Field::text('remitente',null,['placeholder'=>'Remitente','label'=>'De:','aria-required'=>'true', 'class'=>'form-control']) !!}
            </div>
            <div class="col-md-12">
                {!! Field::text('asunto',null,['placeholder'=>'asunto','aria-required'=>'true', 'class'=>'form-control']) !!}
            </div>
            <div class="col-md-12">
                {!! Field::textarea('mensaje',null,['placeholder'=>'mensaje','rows'=>'7','style'=>'width:100%;','aria-required'=>'true', 'class'=>'form-control']) !!}
            </div>
            <div class="col-md-12">
                {!! Form::submit('Enviar email',['class'=>'btn btn-success mt-2']) !!}
            </div>
        </div>
    </div>
</section>
{!! Form::close() !!}
@endsection
@section('page-title','Reporte')