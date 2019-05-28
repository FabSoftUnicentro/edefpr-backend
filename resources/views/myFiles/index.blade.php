@extends('adminlte::page')

@section('title', 'Meus arquivos')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Meus arquivos</h1>
@stop

@section('content')
    @include('myFiles._form', [
        'form' => $form
    ])

    <hr>

    @if (count($files) > 0)
        <div class="box">
        <div class="box-header with-border">
            <div class="pull-left">
                <button id="multiple-file-download" class="btn btn-xs btn-primary">Download selecionados</button>
                <button id="multiple-file-delete" class="btn btn-xs btn-danger">Apagar selecionados</button>
            </div>
        </div>

        <div class="box-body">
            <table class="table table-bordered table-condensed">
                <thead>
                <tr>
                    <th class="text-center">
                        <input id="check-all" type="checkbox" name="all" value="all">
                    </th>
                    <th class="text-center">Arquivo</th>
                    <th class="text-center">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($files as $file)
                    <tr class="text-center">
                        <td><input type="checkbox" class="selected-files" name="foo[]" value="{{ $file->id }}" data-id="{{ $file->id }}"></td>
                        <td>{{ $file->file_name }}</td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="{{ route("myFiles.download", $file->id) }}" target="_blank">
                                Download
                            </a>
                            <a class="btn btn-xs btn-danger file-destroy" data-id="{{ $file->id }} ">
                                Excluir
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="box-footer clearfix text-center">
            {{ $files->links() }}
        </div>
    </div>
    @endif
@endsection

@section('js')
    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#multiple-file-download').on('click', function () {
            var selectedFiles = [];
            $('.selected-files').each(function (element) {
                if ($(this).is(':checked')) {
                    selectedFiles.push($(this).data('id'));
                }
            });

            if (selectedFiles.length > 0) {
                var url = "{{ route('myFiles.download', '_files') }}".replace('_files', selectedFiles.join(','));
                window.open(url, '_blank');
            } else {
                swal("Falha!", "Selecione pelo menos um arquivo!", "error");
            }
        });
    </script>

    <script>
        $('#check-all').on('click', function () {
            $(".selected-files").attr('checked', this.checked);
        });
    </script>

    <script>
        $('.file-destroy').on('click', function () {
            var fileId = $(this).data('id');

            swal("Confirma a exclusão do arquivo?", {
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
                                url: '{{ route('myFiles.destroy', '_file') }}'.replace('_file', fileId),
                                method: 'DELETE',
                                success: function (xhr) {
                                    swal("Sucesso!", "Arquivo deletado", "success");
                                    window.location.reload();
                                },
                                error: function (xhr) {
                                    swal("Falha!", "Arquivo não pôde ser excluído", "error");
                                }
                            });
                            break;
                        default:
                            swal("Operação cancelada!");
                    }
                });
        })
    </script>

    <script>
        $('#multiple-file-delete').on('click', function () {
            var selectedFiles = [];
            $('.selected-files').each(function (element) {
                if ($(this).is(':checked')) {
                    selectedFiles.push($(this).data('id'));
                }
            });

            if (selectedFiles.length > 0) {
                swal("Confirma a exclusão dos arquivos?", {
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
                                var url = "{{ route('myFiles.destroy', '_files') }}".replace('_files', selectedFiles.join(','));

                                $.ajax({
                                    url: url,
                                    method: 'DELETE',
                                    success: function (xhr) {
                                        swal("Sucesso!", "Arquivos deletados", "success");
                                        window.location.reload();
                                    },
                                    error: function (xhr) {
                                        swal("Falha!", "Arquivos não podem ser excluídos", "error");
                                    }
                                });
                                break;
                            default:
                                swal("Operação cancelada!");
                        }
                    });
            } else {
                swal("Falha!", "Selecione pelo menos um arquivo!", "error");
            }
        })
    </script>
@endsection
