@extends('adminlte::page')

@section('title', 'Cadastrar novo nível de acesso')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Cadastrar novo nível de acesso</h1>
@stop

@section('content')
    <div style="margin: 0 auto;">
        @include('roles._form', [
            'form' => $form
        ])
    </div>
@stop

@section('js')
    <script>
        
    </script>
@endsection
