@extends('layouts.admin')


@section('content')
    {!! Form::open(['route' => 'cargar', 'method' => 'post','files' => true]) !!}
    <section class="card">
        <header class="card-header">
            <div class="card-actions">
                <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
            </div>
            <h2 class="card-title">Formulario de carga</h2>
        </header>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    {!! Form::file('file', ['class'=>'form-control']); !!}
                </div>
                <div class="col-md-1">
                    {!! Form::submit('Cargar',['class'=>'form-control btn btn-primary']) !!}
                </div>
                <div class="col-md-5">
                </div>
            </div>
        </div>
    </section>
    {!! Form::close() !!}
    <p></p>
    <div class="row">
        <div class="col-md-12">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle=""></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss=""></a>
                    </div>
    
                    <h2 class="card-title">Datos</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-stripped table-hover table-responsive-lg table-sm mb-0">
                        <thead>
                            <tr class="success">
                                @for ($i = 0; $i < 30; $i++)                                    
                                    <th>C {{ $i+1 }}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mydata as $item)
                                <tr>
                                    <td>{{ $item->c_01 }}</td>
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
@endsection

@section('page-title','Cargar')
