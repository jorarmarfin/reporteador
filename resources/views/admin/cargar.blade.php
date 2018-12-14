@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-6">
            {!! Form::open(['route' => 'cargar', 'method' => 'put']) !!}
            {!! Form::close() !!}
        </div>
        <div class="col-md-6">

        </div>
    </div>
@endsection