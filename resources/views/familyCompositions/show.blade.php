@extends('adminlte::page')

@section('title', 'Visualizar Assistido')

@section('css')
@endsection

@section('content_header')
    <h1>Assistido {{ $assisted->name }}</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-6">
                <h2>Informações Pessoais</h2>

                <p> Nome: {{ $assisted->name }} </p>
                <p> CPF: {{ $assisted->cpf }} </p>
                <p> Email: {{ $assisted->email }} </p>
                <p> Profissao: {{ $assisted->profession }} </p>
                <p> Data de Nascimento: {{ date('d/m/Y', strtotime($assisted->birth_date)) }} </p>
                <p> RG: {{ $assisted->rg }} </p>
                <p> Emissor do RG: {{ $assisted->rg_issuer }} </p>
                <p> Genero: {{ $assisted->gender }} </p>
                <p> Estado Civil: {{ $assisted->marital_status }} </p>
                <p> Observacoes: {{ $assisted->note }} </p>
            </div>

            <div class="col-md-6">
                <h2>Endereco</h2>
                
                <p> CEP: {{ $assisted->postcode }} </p>
                <p> Rua: {{ $assisted->street }} </p>
                <p> Numero: {{ $assisted->number }} </p>
                <p> Bairro: {{ $assisted->neighborhood }} </p>
                <p> UF: {{ $assisted->uf }} </p>
                <p> Cidade: {{ $assisted->city }} </p>
                <p> Complemento: {{ $assisted->complement }} </p>
            </div>
        </div>
    </div>
@stop

@section('js')
@endsection
