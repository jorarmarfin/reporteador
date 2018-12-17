@extends('layouts.admin')
@section('content')
    <iframe src="{{ route('pdf') }}" frameborder="0" width="100%" height="400px"></iframe>
@endsection
@section('page-title','Reporte')