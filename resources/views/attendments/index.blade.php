@extends('adminlte::page')

@section('title', 'Atendimentos')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Atendimentos</h1>
@stop

@section('content')
<div class="box">
    <div class="box-header with-border">
        <div class="pull-right">
            <a class="btn btn-xs btn-primary" href="{{ route('attendments.create') }}">Cadastrar Atendimento</a>
        </div>
    </div>

    <div class="box-body">
        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Responsável</th>
                    <th class="text-center">Assistido</th>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($attendments as $attendment)
                    <tr class="text-center">
                        <td>{{ $attendment->id }}</td>
                        <td>{{ $attendment->user->name }}</td>
                        <td>{{ $attendment->assisted->name }}</td>
                        <td>{{ $attendment->type->name }}</td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="{{ route('attendments.show', $attendment->id) }}">
                                Visualizar
                            </a>
                            <a class="btn btn-xs btn-warning" href="{{ route('attendments.edit', $attendment->id) }}">
                                Editar
                            </a>
                            <a class="btn btn-xs btn-danger attendments-destroy" data-id="{{ $attendment->id }}">
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
        {{ $attendments->links() }}
    </div>
</div>
@stop

@section('js')
    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.attendments-destroy').on('click', function () {
            var attendmentId = $(this).data('id');

            swal("Confirma a exclusão do Atendimento?", {
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
                            url: '{{ route('attendments.destroy', '_attendment') }}'.replace('_attendment', attendmentId),
                            method: 'DELETE',
                            success: function (xhr) {
                                swal("Sucesso!", "Atendimento deletado", "success");
                                window.location.reload();
                            },
                            error: function (xhr) {
                                swal("Falha!", "Atendimento não pôde ser excluído", "error");
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
