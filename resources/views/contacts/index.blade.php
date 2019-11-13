@extends('adminlte::page')

@section('title', 'Contatos')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Contatos</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="pull-right">
                <a class="btn btn-xs btn-primary" href="{{ route('contacts.create') }}">Cadastrar contato</a>
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
                    @foreach ($contacts as $contact)
                        <tr class="text-center">
                            <td>{{ $contact->id }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->cpf }}</td>
                            <td>{{ $contact->rg }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('contacts.show', $contact->id) }}">
                                    Visualizar
                                </a>
                                <a class="btn btn-xs btn-warning" href="{{ route('contacts.edit', $contact->id) }}">
                                    Editar
                                </a>
                                <a class="btn btn-xs btn-danger contact-destroy" data-id="{{ $contact->id }}">
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
            {{ $contacts->links() }}
        </div>
    </div>
@stop

@section('js')
    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.contact-destroy').on('click', function () {
            var contactId = $(this).data('id');

            swal("Confirma a exclusão do contato?", {
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
                            url: '{{ route('contacts.destroy', '_user') }}'.replace('_user', contactId),
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
