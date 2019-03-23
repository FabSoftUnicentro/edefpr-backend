@extends('adminlte::page')

@section('title', 'Editar Membro Familiar')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Editar membro familiar</h1>
@stop

@section('content')
    @include('familyMembers._form', [
        'form' => $form
    ])
@stop
