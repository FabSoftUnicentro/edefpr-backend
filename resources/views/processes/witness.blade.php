@extends('adminlte::page')

@section('title', 'Editar Processo')

@section('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen-sprite@2x.png">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen-sprite.png">
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Editar processo</h1>
@stop

@section('content')
    @include('processes._formWitness', [
        'form' => $form
    ])
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#witnesses').select2({
                multiple: true,
                placeholder: 'Selecione as testemunhas',
                maximumSelectionLength: 3,
                allowClear: true
            });
            $('#witnesses').attr('name', 'witnesses[]');
        });
    </script>
@endsection