@extends('adminlte::page')

@section('title', 'Editar parte contrária')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Editar parte contrária</h1>
@stop

@section('content')
    @include('counterParts._form', [
        'form' => $form
    ])
@stop
