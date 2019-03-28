@extends('adminlte::page')

@section('title', 'Cadastrar Membro Familiar')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Cadastrar novo membro familiar</h1>
@stop

@section('content')
    @include('familyMembers._form', [
        'form' => $form
    ])
@stop
