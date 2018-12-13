@extends('adminlte::page')

@section('title', 'Cadastrar novo tipo de atendimento')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Cadastrar novo tipo de atendimento</h1>
@stop

@section('content')
    @include('attendmentTypes._form', [
        'form' => $form
    ])
@stop
