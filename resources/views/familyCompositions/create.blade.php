@extends('adminlte::page')

@section('title', 'Cadastrar Composição Familiar')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Cadastrar nova composição familiar</h1>
@stop

@section('content')
    @include('familyCompositions._form', [
        'form' => $form
    ])
@stop
