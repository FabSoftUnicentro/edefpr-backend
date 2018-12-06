@extends('adminlte::page')

@section('title', 'Editar nível de acesso')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Editar nível de acesso</h1>
@stop

@section('content')
    @include('roles._form', [
        'form' => $form
    ])
@stop
