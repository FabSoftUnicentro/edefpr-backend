@extends('adminlte::page')

@section('title', 'Parte Contrária')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Parte Contrária</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <div class="pull-right">
                <a class="btn btn-xs btn-primary" href="{{ route('counterParts.create') }}">Cadastrar parte contrária</a>
            </div>
        </div>

        <div class="box-body">
            <table class="table table-bordered table-condensed">
                <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th class="text-center">Parte contrária</th>
                    <th class="text-center">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($counterParts as $counterPart)
                    <tr class="text-center">
                        <td>{{ $counterPart->id }}</td>
                        <td>{{ $counterPart->name }}</td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="{{ route('counterParts.show', $counterPart->id) }}">
                                Visualizar
                            </a>
                            <a class="btn btn-xs btn-warning" href="{{ route('counterParts.edit', $counterPart->id) }}">
                                Editar
                            </a>
                            <a class="btn btn-xs btn-danger counter-part-destroy" data-id="{{ $counterPart->id }}">
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
            {{ $counterParts->links() }}
        </div>
    </div>
@stop

@section('js')
    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.counter-part-destroy').on('click', function () {
            var counterPartId = $(this).data('id');

            swal("Confirma a exclusão da parte contrária?", {
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
                            url: '{{ route('counterParts.destroy', '_counterPart') }}'.replace('_counterPart', counterPartId),
                            method: 'DELETE',
                            success: function (xhr) {
                                swal("Sucesso!", "Parte contrária deletado", "success");
                                window.location.reload();
                            },
                            error: function (xhr) {
                                swal("Falha!", "Parte contrária não pôde ser excluído", "error");
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
