@extends('adminlte::page')

@section('title', 'Permissão')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Permissões</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <div class="pull-right">
                <a class="btn btn-xs btn-primary" href="{{ route('permissions.create') }}">Cadastrar permissão</a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Descrição</th>
                        <th class="text-center">Ação</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr class="text-center">
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->description }}</td>

                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('permissions.show', $permission->id)  }}">
                                    Visualizar
                                </a>
                                <a class="btn btn-xs btn-warning" href="{{ route('permissions.edit', $permission->id) }}">
                                    Editar
                                </a>
                                <a class="btn btn-xs btn-danger permission-destroy" data-id="{{ $permission->id }}">
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
            {{ $permissions->links() }}
        </div>
    </div>
@stop

@section('js')
    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.permission-destroy').on('click', function () {
            var permissionId = $(this).data('id');

            swal("Confirma a exclusão do permissão?", {
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
                            url: '{{ route('permissions.destroy', '_permission') }}'.replace('_permission', permissionId),
                            method: 'DELETE',
                            success: function (xhr) {
                                swal("Sucesso!", "Permissão deletada", "success");
                                window.location.reload();
                            },
                            error: function (xhr) {
                                swal("Falha!", "Permissão não pôde ser excluído", "error");
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
