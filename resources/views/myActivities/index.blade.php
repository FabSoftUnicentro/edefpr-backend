@extends('adminlte::page')

@section('title', 'Minhas atividades')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Minhas Atividades</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="pull-right">
                <a class="btn btn-xs btn-primary" href="{{ route('myActivities.create') }}">Registrar atividades</a>
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-condensed">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Atividade</th>
                    <th class="text-center">Data</th>
                    <th class="text-center">Hora</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($activities as $activity)
                    <tr class="text-center">
                        <td>{{ $activity->id }}</td>
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
@stop
