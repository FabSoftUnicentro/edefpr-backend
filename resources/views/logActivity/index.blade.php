@extends('adminlte::page')

@section('title', 'Relatório de atividades')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Resgistro de Atividades</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <div>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#painel-body" aria-expanded="false">
                    Filtros
                </button>
                <div class="collapse" id="painel-body">
                    @include('logActivity._form', [
                        'form' => $form
                    ])
                </div>
            </div>
        </div>

        <div class="box-body">
            <table class="table table-bordered table-condensed">
                <thead>
                <tr>
                    <th class="text-center">Nome</th>
                    <th class="text-center">Atividade</th>
                    <th class="text-center">Data</th>
                    <th class="text-center">Hora</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($activities as $activity)
                    <tr class="text-center">
                        <td>{{ $activity->causer->name }}</td>
                        <td>{{ $activity->description }}</td>
                        <td>{{ date('d/m/Y', strtotime($activity->date)) }}</td>
                        <td>{{ $activity->hour }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix text-center">
            {{ $activities->links() }}
        </div>
    </div>
    </div>
@stop
