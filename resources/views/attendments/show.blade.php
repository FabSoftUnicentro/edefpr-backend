@extends('adminlte::page')

@section('title', 'Visualizar atendimento')

@section('css')
@endsection

@section('content_header')
    <h1>Visualizar Atendimento {{ $attendment->name }}</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-12">
                <h2>Informações do tipo de atendimento</h2>
                <p> Responsável: {{ $attendment->user->name }} </p>
                <p> Assitido: {{ $attendment->assisted->name }} </p>
                <p> Tipo do atendimento: {{ $attendment->type->name }} </p>
                <p> Descrição: {{ $attendment->description }} </p>
            </div>
        </div>
    </div>
@stop
