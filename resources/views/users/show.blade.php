@extends('adminlte::page')

@section('title', 'Visualizar Assistido')

@section('css')
@endsection

@section('content_header')
    <h1>Funcionáio {{ $user->name }}</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-6">
                <h2>Informações Pessoais</h2>

                <p> Nome: {{ $user->name }} </p>
                <p> CPF: {{ $user->cpf }} </p>
                <p> Email: {{ $user->email }} </p>
                <p> Profissao: {{ $user->profession }} </p>
                <p> Data de Nascimento: {{ date('d/m/Y', strtotime($user->birth_date)) }} </p>
                <p> RG: {{ $user->rg }} </p>
                <p> Emissor do RG: {{ $user->rg_issuer }} </p>
                <p> Genero: {{ $user->gender }} </p>
                <p> Estado Civil: {{ $user->marital_status }} </p>
                <p> Observacoes: {{ $user->note }} </p>
            </div>

            <div class="col-md-6">
                <h2>Endereco</h2>
                
                <p> CEP: {{ $user->postcode }} </p>
                <p> Rua: {{ $user->street }} </p>
                <p> Numero: {{ $user->number }} </p>
                <p> Bairro: {{ $user->neighborhood }} </p>
                <p> UF: {{ $user->uf }} </p>
                <p> Cidade: {{ $user->city }} </p>
                <p> Complemento: {{ $user->complement }} </p>
            </div>
        </div>
    </div>
@stop

@section('js')
@endsection
