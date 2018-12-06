@extends('adminlte::page')

@section('title', 'Cadastrar nova permissão')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Cadastrar nova permissão</h1>
@stop

@section('content')
    @include('permissions._form', [
        'form' => $form
    ])
@stop
