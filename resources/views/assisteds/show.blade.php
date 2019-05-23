@extends('adminlte::page')

@section('title', 'Visualizar Assistido')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Assistido {{ $assisted->name }}</h1>
@stop

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="pull-right">
                    <a class="btn btn-xs btn-primary" href="{{ route('familyMembers.index', $assisted->id) }}">Editar Composição Familiar</a>
                    <a class="btn btn-xs btn-primary" href="{{ route('assistedAssets.index', $assisted->id) }}">Editar bens materiais</a>
                    <a class="btn btn-xs btn-primary" href="{{ route('assistedsHousingSituation.edit', $assisted->id) }}">Editar Situação Habitacional</a>
                    <a class="btn btn-xs btn-primary" href="{{ route('assistedsFamilyIncomes.edit', $assisted->id) }}">Editar Renda Familiar</a>
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

                    <h2>Situação Habitacional</h2>

                    <p> <b>Tipo de Residência:</b> {{ __('translations.residence_kind.'.$assisted->residence_kind) }} </p>
                    <p> <b>Situação da Residência:</b> {{ __('translations.residence_situation.'.$assisted->residence_situation) }} </p>
                    <p> <b>Valor do Aluguel:</b> R$ {{ $assisted->rental_value }} </p>
                </div>

                <div class="col-md-6">
                    <h2>Renda familiar</h2>

                    <p> <b>Bolsa-Família + BPC + Estágio:</b> R$ {{ $assisted->social_programs }} </p>
                    <p> <b>Contruição Previdenciária:</b> R$ {{ $assisted->social_security_contribution }}</p>
                    <p> <b>Imposto de Renda:</b> R$ {{ $assisted->income_tax }} </p>
                    <p> <b>Pensão Alimentícia:</b> R$ {{ $assisted->alimony }} </p>
                    <p> <b>Gastos Extraordinários:</b> R$ {{ $assisted->extraordinary_expenses }} </p>
                    <p> <b>Renda Familiar:</b> R$ {{ $assisted->getFamilyIncome() }} </p>
                    <p> <b>Renda Familiar Liquida:</b> R$ {{ $assisted->getNetFamilyIncome() }} </p>

                    <h2>Endereço</h2>

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
