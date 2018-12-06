@extends('adminlte::page')

@section('title', 'Visualizar Permissão')

@section('css')
@endsection

@section('content_header')
    <h1>Permissão: {{ $permission->description }}</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-12">
                <h2>Informações Da Permissão</h2>

                <p> Nome: {{ $permission->name }} </p>
                <p> Descrição: {{ $permission->description }} </p>
            </div>
        </div>
    </div>
@stop

@section('js')
@endsection
