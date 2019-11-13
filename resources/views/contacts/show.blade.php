@extends('adminlte::page')

@section('title', 'Visualizar Contatos')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1 class="">Contatos<b> {{ $contact->name }}</b></h1>
@stop

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="pull-right">
                    <a class="btn btn-xs btn-primary" href="{{ route('contacts.edit', $contact->id) }}">Editar Contato</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-12">
                    <h2>Informações Pessoais</h2>

                    <p> <b>Nome:</b> {{ $contact->name }} </p>
                    <p> <b>Telefone:</b> {{ $contact->phone }} </p>
                    <p> <b>Email:</b> {{ $contact->email }} </p>
                    
                    <h2>Endereço</h2>

                    <p> <b>Uf:</b> {{ $contact->uf }} </p>
                    <p> <b>Cidade:</b> {{ $contact->city }} </p>
                    <p> <b>Numero:</b> {{ $contact->number }} </p>
                    <p> <b>Rua:</b>    {{ $contact->street }} </p>
                    <p> <b>Cep:</b>    {{ $contact->postcode }} </p>
                    <p> <b>Complemento:</b> {{ $contact->complement }} </p>
                    <p> <b>Bairro:</b> {{ $contact->neighborhood }} </p>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
@endsection
