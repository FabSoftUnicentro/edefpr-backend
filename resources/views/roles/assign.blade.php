@extends('adminlte::page')

@section('title', 'Visualizar nível de Acesso')

@section('css')
@endsection

@section('content_header')
    <h1>Nível de Acesso</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-6">
                <select>
                <option></option>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}"> {{ $role->description }} </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
@stop

@section('js')
@endsection
