@extends('adminlte::page')

@section('title', 'Visualizar Proceso')

@section('css')
@endsection

@section('content_header')
    <h1>Processo referente ao assistido <b>{{ $process->assisted->name }}</b></h1>
@stop

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="pull-right">
                    <a class="btn btn-xs btn-primary" href="{{ route('processes.getWitness', $process->id) }}">Adicionar Testemunhas</a>
                    <a class="btn btn-xs btn-primary" href="{{ route('processes.edit', $process->id) }}">Editar processo</a>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6">
                    <h2>Informações Gerais</h2>

                    <p> <b>Titulo:</b> {{ $process->title }} </p>
                    <p> <b>Descrição:</b> {{ $process->description }} </p>
                    <p> <b>Assistido:</b> {{ $process->assisted->name }} </p>
                    <p> <b>Parte Contrária:</b> {{ $process->counterPart->name }} </p>
                    <p> <b>Funcionário:</b> {{ $process->user->name }} </p>
                </div>

                <div class="col-md-6">
                    <h2>Testemunhas</h2>

                    @foreach($process->witnesses as $witness)
                        <p>
                            <b>Nome:</b> {{ $witness->name }}
                            <a class="btn btn-xs btn-danger pull-right unset-witness" data-id="{{ $witness }}">
                                Excluir
                            </a>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.unset-witness').on('click', function () {
            var witness = $(this).data('id');
            var witnessId = witness.pivot.witness_id;
            var processId = witness.pivot.process_id;

            swal("Confirma a remoção da testemunha?", {
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
                                url: '{{ route('processes.unsetWitness', ['_process', '_witness']) }}'.replace('_process', processId).replace('_witness', witnessId),
                                method: 'PUT',
                                success: function (xhr) {
                                    swal("Sucesso!", "Testemunha removida", "success");
                                    window.location.reload();
                                },
                                error: function (xhr) {
                                    swal("Falha!", "Testemunha não pôde ser removida", "error");
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
