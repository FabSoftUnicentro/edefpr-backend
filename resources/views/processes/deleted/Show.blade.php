@extends('adminlte::page')

@section('title', 'Visualizar Proceso')

@section('content_header')
    @include('helpers.flash-message')
    <h1>Processo referente ao assistido <b>{{ $process->assisted->name }}</b> - <b class="text-red">Arquivado</b></h1>
@stop

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header with-border"></div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <h2>Informações Gerais</h2>

                    <p> <b>Titulo:</b> {{ $process->title }} </p>
                    <p> <b>Descrição:</b> {{ $process->description }} </p>
                    <p> <b>Assistido:</b> {{ $process->assisted->name }} </p>
                    <p> <b>Parte Contrária:</b> {{ optional($process->counterPart)->name }} </p>
                    <p> <b>Funcionário:</b> {{ $process->user->name }} </p>
                </div>

                <div class="col-md-6">
                    <h2>Testemunhas</h2>

                    @foreach($process->witnesses as $witness)
                        <p>
                            <b>Nome:</b> {{ $witness->name }}
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop
