@extends('adminlte::page')

@section('title', 'Cadastrar parte contrária')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Cadastrar parte contrária</h1>
@stop

@section('content')
    @include('counterParts._form', [
        'form' => $form
    ])
@stop

@section('js')
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script>
        $("#remuneration").mask('000.000.000,00', { reverse: true });
        $("#document_number").mask('000.000.000-00');
    </script>

    <script>
        const masks = ['000.000.000-00', '00.000.000/0000-00'];

        $("#document_type").change(function (e) {
            if ($("#document_type")[0].value ==  "CPF") {
                $("#document_number").mask(masks[0]);
            } else {
                $("#document_number").mask(masks[1]);
            }
        })
    </script>

    <script>
        $("#uf").change(function (e) {
            const uf = $("#uf")[0].value;

            $.ajax({
                url: '{{ route('utils.get_cities', '_uf') }}'.replace('_uf', uf),
                method: 'POST',
                success: function (xhr) {
                    $("#city").empty();
                    $.each(xhr.cities, function(key, value) {
                        $("#city").append($('<option></option>').attr('value', value).text(key));
                    });
                },
                error: function (xhr) {

                }
            })
        })
    </script>
@endsection
