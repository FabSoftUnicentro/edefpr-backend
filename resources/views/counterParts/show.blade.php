@extends('adminlte::page')

@section('title', 'Visualizar parte contrária')

@section('css')
@endsection

@section('content_header')
    <h1>Visualizar parte contrária: {{ $counterPart->name }}</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-body">
            <div class="col-md-6">
                <h2>Informações Pessoais</h2>
                <p>Nome : {{ $counterPart->name }}</p>
                <p>RG : {{ $counterPart->rg }}</p>
                <p>Emissor do RG : {{ $counterPart->rg_issuer }}</p>
                <p>CPF/CNPF : {{ $counterPart->document_number }}</p>
                <p>Número de telefone : {{ $counterPart->phone_number }}</p>
                <p>Remuneração : R$ {{ $counterPart->remuneration }}</p>
                <p>Prefissão : {{ $counterPart->profession }}</p>
                <p>Dados do trabalho : {{ $counterPart->note }}</p>
            </div>

            <div class="col-md-6">
                <h2>Endereço</h2>
                <p>UF : {{ $counterPart->uf }}</p>
                <p>Cidade : {{ $counterPart->city }}</p>
                <p>Rua : {{ $counterPart->street }}</p>
                <p>Número : {{ $counterPart->number }}</p>
                <p>CEP : {{ $counterPart->postcode }}</p>
                <p>Complemento : {{ $counterPart->complement }}</p>
                <p>Bairro : {{ $counterPart->neighborhood }}</p>
            </div>
        </div>
    </div>
@stop
