@extends('adminlte::page')

@section('title', 'Assistidos')

@section('content_header')
    @include('helpers.flash-message')
    <h1>Bens materiais do assistido <b>{{ $assisted->name }}</b></h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="pull-right">
                <a class="btn btn-xs btn-primary" href="{{ route('assisteds.asset.create', $assisted->id) }}">Cadastrar Bem Material</a>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Nome</th>
                        <th class="text-center">Condição</th>
                        <th class="text-center">Preço</th>
                        <th class="text-center">Valor da Prestação</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assistedAssets as $assistedAsset)
                        <tr class="text-center">
                            <td>{{ $assistedAsset->id }}</td>
                            <td>{{ __('translations.name.'.$assistedAsset->name) }}</td>
                            <td>{{ __('translations.status.'.$assistedAsset->status) }}</td>
                            <td>R$ {{ money($assistedAsset->price) }}</td>
                            <td>R$ {{ money($assistedAsset->installment_price) }}</td>

                            <td>
                                <a class="btn btn-xs btn-warning" href="{{ route('assisteds.assets.edit', [$assisted->id, $assistedAsset->id]) }}">
                                    Editar
                                </a>
                                <a class="btn btn-xs btn-danger assistedAsset-destroy" data-asset-id="{{ $assistedAsset->id }}" data-assisted-id="{{ $assisted->id }}">
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
            {{ $assistedAssets->links() }}
        </div>
    </div>
@stop

@section('js')
    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.assistedAsset-destroy').on('click', function () {
            var assetId = $(this).data('asset-id');
            var assistedId = $(this).data('assisted-id');

            swal("Confirma a exclusão do bem material do assistido?", {
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
                            url: '{{ route('assisteds.assets.destroy', ['_assistedId', '_assetId']) }}'.replace('_assistedId', assistedId).replace('_assetId', assetId),
                            method: 'DELETE',
                            success: function (xhr) {
                                console.log(xhr);
                                swal("Sucesso!", "Bem material deletado", "success");
                                window.location.reload();
                            },
                            error: function (xhr) {
                                swal("Falha!", "Bem material não pôde ser excluído", "error");
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
