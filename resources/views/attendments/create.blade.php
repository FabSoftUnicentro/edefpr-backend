@extends('adminlte::page')

@section('title', 'Cadastrar novo atendimento')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Cadastrar novo atendimento</h1>
@stop

@section('content')
    @include('attendments._form', [
        'form' => $form
    ])
@stop
