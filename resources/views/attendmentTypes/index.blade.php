@extends('adminlte::page')

@section('title', 'Tipos de Atendimento')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Tipos de Atendimento</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <div class="pull-right">
                <a class="btn btn-xs btn-primary" href="{{ route('attendmentTypes.create') }}">Cadastrar tipo de atendimento</a>
            </div>
        </div>
        
        <div class="box-body">
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attendmentTypes as $attendmentType)
                        <tr class="text-center">
                            <td>{{ $attendmentType->id }}</td>
                            <td>{{ $attendmentType->name }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('attendmentTypes.show', $attendmentType->id) }}">
                                    Visualizar
                                </a>
                                <a class="btn btn-xs btn-warning" href="{{ route('attendmentTypes.edit', $attendmentType->id) }}">
                                    Editar
                                </a>
                                <a class="btn btn-xs btn-danger attendment-types-destroy" data-id="{{ $attendmentType->id }}">
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
            {{ $attendmentTypes->links() }}
        </div>
    </div>
@stop

@section('js')
    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.attendment-types-destroy').on('click', function () {
            var attendmentTypeId = $(this).data('id');

            swal("Confirma a exclusão do Tipo de Atendimento?", {
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
                            url: '{{ route('attendmentTypes.destroy', '_attendmentType') }}'.replace('_attendmentType', attendmentTypeId),
                            method: 'DELETE',
                            success: function (xhr) {
                                swal("Sucesso!", "Tipo de atendimento deletado", "success");
                                window.location.reload();
                            },
                            error: function (xhr) {
                                swal("Falha!", "Tipo de atendimento não pôde ser excluído", "error");
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
