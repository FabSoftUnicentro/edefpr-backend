@extends('adminlte::page')

@section('title', 'Editar tipo de atendimento')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Editar tipo de atendimento</h1>
@stop

@section('content')
    @include('attendmentTypes._form', [
        'form' => $form
    ])
@stop
