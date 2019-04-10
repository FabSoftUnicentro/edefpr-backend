@extends('adminlte::page')

@section('title', 'Editar Processo')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Editar processo</h1>
@stop

@section('content')
    @include('processes._formWitness', [
        'form' => $form
    ])
@stop
