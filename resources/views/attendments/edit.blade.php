@extends('adminlte::page')

@section('title', 'Editar atendimento')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Editar atendimento</h1>
@stop

@section('content')
@include('attendments._form', [
    'form' => $form
])
@stop
