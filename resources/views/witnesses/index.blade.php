@extends('adminlte::page')

@section('title', 'Assistidos')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Testemunhas</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="pull-right">
                <a class="btn btn-xs btn-primary" href="{{ route('witnesses.create') }}">Cadastrar Testemunha</a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">CPF</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($witnesses as $witness)
                        <tr class="text-center">
                            <td>{{ $witness->id }}</td>
                            <td>{{ $witness->name }}</td>
                            <td>{{ $witness->cpf }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('witnesses.show', $witness->id) }}">
                                    Visualizar
                                </a>
                                <a class="btn btn-xs btn-warning" href="{{ route('witnesses.edit', $witness->id) }}">
                                    Editar
                                </a>
                                <a class="btn btn-xs btn-danger witness-destroy" data-id="{{ $witness->id }}">
                                    Excluir
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix text-center">
            {{ $witnesses->links() }}
        </div>
    </div>
@stop

@section('js')
    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.witness-destroy').on('click', function () {
            var witnessId = $(this).data('id');

            swal("Confirma a exclusão da testemunha?", {
                buttons: {
                    cancel: "Cancelar",
                    catch: {
                        text: "Confirmar",
                        value: "confirm",
                    },
                },
            })
            .then((value) => {
                switch (value) {
                    case "confirm":
                        $.ajax({
                            url: '{{ route('witnesses.destroy', '_witness') }}'.replace('_witness', witnessId),
                            method: 'DELETE',
                            success: function (xhr) {
                                swal("Sucesso!", "Testemunha deletada", "success");
                                window.location.reload();
                            },
                            error: function (xhr) {
                                swal("Falha!", "Testemunha não pôde ser excluída", "error");
                            }
                        });
                        break;
                    default:
                        swal("Operação cancelada!");
                }
            });
        })
    </script>
@endsection
