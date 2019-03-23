@extends('adminlte::page')

@section('title', 'Visualizar Assistido')

@section('css')
@endsection

@section('content_header')
    <h1>Testemunha do Assistido {{ $witness->assisted->name }}</h1>
@stop

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="pull-right">
                    <a class="btn btn-xs btn-primary" href="{{ route('witnesses.edit', $witness->id) }}">Editar testemunha</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <h3>Informações Pessoais</h3>

                    <p> <b>Nome:</b> {{ $witness->name }} </p>
                    <p> <b>CPF:</b> {{ $witness->cpf }} </p>
                    <p> <b>RG:</b> {{ $witness->rg }} </p>
                    <p> <b>Emissor do RG:</b> {{ $witness->rg_issuer }} </p>
                </div>

                <div class="col-md-6">
                    <h3>Endereço</h3>

                    <p> <b>CEP:</b> {{ $witness->postcode }} </p>
                    <p> <b>Rua:</b> {{ $witness->street }} </p>
                    <p> <b>Numero:</b> {{ $witness->number }} </p>
                    <p> <b>Bairro:</b> {{ $witness->neighborhood }} </p>
                    <p> <b>UF:</b> {{ $witness->uf }} </p>
                    <p> <b>Cidade:</b> {{ $witness->city }} </p>
                    <p> <b>Complemento:</b> {{ $witness->complement }} </p>
                </div>
            </div>
        </div>
    </div>
@stop
