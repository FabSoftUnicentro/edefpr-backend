@extends('adminlte::page')

@section('title', 'Cadastrar Novo Processo')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Cadastrar novo processo</h1>
@stop

@section('content')
    @include('processes._form', [
        'form' => $form
    ])
@stop
