@extends('adminlte::page')

@section('title', 'Editar Composição Familiar')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Editar composição familiar</h1>
@stop

@section('content')
    @include('familyCompositions._form', [
        'form' => $form
    ])
@stop
