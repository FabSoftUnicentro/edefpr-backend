@extends('adminlte::page')

@section('title', 'Composição familiar')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Composição Familiar</h1>
@stop

@section('content')
    <div class="box box-primary ">
        <div class="box-header with-border ">
            <div class="pull-right">
                <a class="btn btn-xs btn-primary" href="{{ route('familyMembers.create') }}">Cadastrar membro familiar</a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Assistido</th>
                        <th class="text-center">Situação Legal</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($familyMembers as $familyMember)
                        <tr class="text-center">
                            <td>{{ $familyMember->id }}</td>
                            <td>{{ $familyMember->name }}</td>
                            <td>{{ $familyMember->assisted->name }}</td>
                            <td>{{ __('translations.legal_situation.'.$familyMember->legal_situation) }}</td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('familyMembers.show', $familyMember->id) }}">
                                    Visualizar
                                </a>
                                <a class="btn btn-xs btn-warning" href="{{ route('familyMembers.edit', $familyMember->id) }}">
                                    Editar
                                </a>
                                <a class="btn btn-xs btn-danger familyComposition-destroy" data-id="{{ $familyMember->id }}">
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
            {{ $familyMembers->links() }}
        </div>
    </div>
@stop

@section('js')
    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.familyComposition-destroy').on('click', function () {
            var familyMemberId = $(this).data('id');

            swal("Confirma a exclusão da composição familiar?", {
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
                            url: '{{ route('familyMembers.destroy', '_familyMember') }}'.replace('_familyMember', familyMemberId ),
                            method: 'DELETE',
                            success: function (xhr) {
                                swal("Sucesso!", "Composição familiar deletada", "success");
                                window.location.reload();
                            },
                            error: function (xhr) {
                                swal("Falha!", "Composição familiar não pôde ser excluída", "error");
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
