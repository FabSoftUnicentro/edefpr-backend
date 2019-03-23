@extends('adminlte::page')

@section('title', 'Assistidos')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Assistidos</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
            <div class="pull-right">
                <a class="btn btn-xs btn-primary" href="{{ route('assisteds.create') }}">Cadastrar assistido</a>
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
                        <th class="text-center">RG</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assisteds as $assisted)
                        <tr class="text-center">
                            <td>{{ $assisted->id }}</td>
                            <td>{{ $assisted->name }}</td>
                            <td>{{ $assisted->cpf }}</td>
                            <td>{{ $assisted->rg }}</td>
                            <td>{{ $assisted->email }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('assisteds.show', $assisted->id) }}">
                                    Visualizar
                                </a>
                                <a class="btn btn-xs btn-warning" href="{{ route('assisteds.edit', $assisted->id) }}">
                                    Editar
                                </a>
                                <a class="btn btn-xs btn-danger assisted-destroy" data-id="{{ $assisted->id }}">
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
            {{ $assisteds->links() }}
        </div>
    </div>
@stop

@section('js')
    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.assisted-destroy').on('click', function () {
            var assistedId = $(this).data('id');

            swal("Confirma a exclusão do assistido?", {
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
                            url: '{{ route('assisteds.destroy', '_user') }}'.replace('_user', assistedId),
                            method: 'DELETE',
                            success: function (xhr) {
                                swal("Sucesso!", "Assistido deletado", "success");
                                window.location.reload();
                            },
                            error: function (xhr) {
                                swal("Falha!", "Assistido não pôde ser excluído", "error");
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
