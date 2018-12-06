@extends('adminlte::page')

@section('title', 'Visualizar tipo de atendimento')

@section('css')
@endsection

@section('content_header')
    <h1>Visualizar o tipo de atendimento {{ $attendmentType->name }}</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-12">
                <h2>Informações do tipo de atendimento</h2>

                <p> Nome: {{ $attendmentType->name }} </p>
                <p> Descrição: {{ $attendmentType->description }} </p>
            </div>
        </div>
    </div>
@stop

@section('js')
@endsection
