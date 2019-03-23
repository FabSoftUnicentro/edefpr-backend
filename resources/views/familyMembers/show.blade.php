@extends('adminlte::page')

@section('title', 'Visualizar Composição Familiar')

@section('css')
@endsection

@section('content_header')
    <h1>Familia do Assistido {{ $familyMember->assisted->name }}</h1>
@stop

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header with-border">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <h3>Informações Pessoais</h3>

                    <p> <b>Nome:</b> {{ $familyMember->name }} </p>
                    <p> <b>Assitido:</b> {{ $familyMember->assisted->name }} </p>
                    <p> <b>Situação Legal:</b> {{ __('translations.legal_situation.'.$familyMember->legal_situation) }} </p>
                    <p> <b>Grau de Parentesco:</b> {{ __('translations.kinship.'.$familyMember->kinship) }}</p>
                    <p> <b>Data de Nascimento:</b> {{ date('d/m/Y', strtotime($familyMember->birth_date)) }} </p>
                    <p> <b>Tabalho:</b> {{ $familyMember->work }} </p>
                    <p> <b>Renda:</b> R$ {{ $familyMember->income }} </p>
            </div>
        </div>
    </div>
@stop
