@extends('adminlte::page')

@section('title', 'Cadastrar parte contrária')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Cadastrar parte contrária</h1>
@stop

@section('content')
    @include('counterParts._form', [
        'form' => $form
    ])
@stop
