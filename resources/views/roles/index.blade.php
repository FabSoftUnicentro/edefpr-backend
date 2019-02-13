@extends('adminlte::page')

@section('title', 'Níveis de Acesso')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Níveis de Acesso</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <div class="pull-right">
                <a class="btn btn-xs btn-primary" href="{{ route('roles.change.permissions') }}">Atribuir Permissões para Cargos</a>
                <a class="btn btn-xs btn-primary" href="{{ route('users.change.permissions') }}">Atribuir Permissões para Funcionários</a>
                <a class="btn btn-xs btn-primary" href="{{ route('roles.create') }}">Cadastrar Nível de Acesso</a>
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
                    @foreach ($roles as $role)
                        <tr class="text-center">
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('roles.show', $role->id) }}">
                                    Visualizar
                                </a>
                                <a class="btn btn-xs btn-warning" href="{{ route('roles.edit', $role->id) }}">
                                    Editar
                                </a>
                                <a class="btn btn-xs btn-danger role-destroy" data-id="{{ $role->id }}">
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
            {{ $roles->links() }}
        </div>
    </div>
@stop

@section('js')
    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.role-destroy').on('click', function () {
            var roleId = $(this).data('id');

            swal("Confirma a exclusão do nível de acesso?", {
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
                            url: '{{ route('roles.destroy', '_role') }}'.replace('_role', roleId),
                            method: 'DELETE',
                            success: function (xhr) {
                                swal("Sucesso!", "Nível de acesso deletado", "success");
                                window.location.reload();
                            },
                            error: function (xhr) {
                                swal("Falha!", "Nível de acesso não pôde ser excluído", "error");
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
