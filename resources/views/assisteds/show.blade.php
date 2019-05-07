@extends('adminlte::page')

@section('title', 'Visualizar Assistido')

@section('css')
@endsection

@section('content_header')
    <h1>Assistido {{ $assisted->name }}</h1>
@stop

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="pull-right">
                    <a class="btn btn-xs btn-primary" href="{{ route('assisteds.edit', $assisted->id) }}">Editar assistido</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <h2>Informações Pessoais</h2>

                    <p> <b>Nome:</b> {{ $assisted->name }} </p>
                    <p> <b>Nome Social:</b> {{ $assisted->social_name }} </p>
                    <p> <b>CPF:</b> {{ $assisted->cpf }} </p>
                    <p> <b>Email:</b> {{ $assisted->email }} </p>
                    <p> <b>Profissao:</b> {{ $assisted->profession }} </p>
                    <p> <b>Naturalidade:</b> {{ $assisted->naturalness }} </p>
                    <p> <b>Escolaridade:</b> {{ __('translations.schooling.'.$assisted->schooling) }} </p>
                    <p> <b>Data de Nascimento:</b> {{ date('d/m/Y', strtotime($assisted->birth_date)) }} </p>
                    <p> <b>RG:</b> {{ $assisted->rg }} </p>
                    <p> <b>Emissor do RG:</b> {{ $assisted->rg_issuer }} </p>
                    <p> <b>Genero:</b> {{ __('translations.gender.'.$assisted->gender) }} </p>
                    <p> <b>Estado Civil:</b> {{ __('translations.marital_status.'.$assisted->marital_status) }} </p>
                    <p> <b>Observacoes:</b> {{ $assisted->note }} </p>
                </div>

                <div class="col-md-6">
                    <h2>Endereco</h2>

                    <p> <b>CEP:</b> {{ $assisted->postcode }} </p>
                    <p> <b>Rua:</b> {{ $assisted->street }} </p>
                    <p> <b>Numero:</b> {{ $assisted->number }} </p>
                    <p> <b>Bairro:</b> {{ $assisted->neighborhood }} </p>
                    <p> <b>UF:</b> {{ $assisted->uf }} </p>
                    <p> <b>Cidade:</b> {{ $assisted->city }} </p>
                    <p> <b>Complemento:</b> {{ $assisted->complement }} </p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
@endsection
