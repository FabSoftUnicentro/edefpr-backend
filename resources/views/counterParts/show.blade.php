@extends('adminlte::page')

@section('title', 'Visualizar parte contrária')

@section('css')
@endsection

@section('content_header')
    <h1>Parte Contrária <b>{{ $counterPart->name }}</b></h1>
@stop

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="pull-right">
                    <a class="btn btn-xs btn-primary" href="{{ route('counterParts.edit', $counterPart->id) }}">Editar Parte Contrária</a>
                </div>
            </div>
            <div class="box-body">
                <div class="col-md-6">
                    <h2>Informações Pessoais</h2>

                    <p> <b>Nome:</b> {{ $counterPart->name }}</p>
                    <p> <b>RG:</b> {{ $counterPart->rg }}</p>
                    <p> <b>Emissor do RG:</b> {{ $counterPart->rg_issuer }}</p>
                    <p> <b>CPF/CNPF:</b> {{ $counterPart->document_number }}</p>
                    <p> <b>Número de telefone:</b> {{ $counterPart->phone_number }}</p>
                    <p> <b>Remuneração:</b> R$ {{ $counterPart->remuneration }}</p>
                    <p> <b>Prefissão:</b> {{ $counterPart->profession }}</p>
                    <p> <b>Observações:</b> {{ $counterPart->note }}</p>
                </div>

                <div class="col-md-6">
                    <h2>Endereço</h2>

                    <p> <b>UF:</b> {{ $counterPart->uf }}</p>
                    <p> <b>Cidade:</b> {{ $counterPart->city }}</p>
                    <p> <b>Rua:</b> {{ $counterPart->street }}</p>
                    <p> <b>Número:</b> {{ $counterPart->number }}</p>
                    <p> <b>CEP:</b> {{ $counterPart->postcode }}</p>
                    <p> <b>Complemento:</b> {{ $counterPart->complement }}</p>
                    <p> <b>Bairro:</b> {{ $counterPart->neighborhood }}</p>
                </div>
            </div>
        </div>
    </div>
@stop
