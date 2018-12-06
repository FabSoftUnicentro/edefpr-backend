@extends('adminlte::page')

@section('title', 'Editar permissão')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Editar permissão</h1>
@stop

@section('content')
    @include('permissions._form', [
        'form' => $form
    ])
@stop
