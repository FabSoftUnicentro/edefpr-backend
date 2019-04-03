@extends('adminlte::page')

@section('title', 'Cadastrar Nova Testemunha')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Cadastrar nova testemunha</h1>
@stop

@section('content')
    @include('witnesses._form', [
        'form' => $form
    ])
@stop

@section('js')
    <script>
        $('#postcode').change(function () {
            $.ajax({
                url: '{{ route('postcode.search', '_postcode') }}'.replace('_postcode', $('#postcode').val()),
                success: function (xhr) {
                    console.log(xhr);
                    $('#uf').val(xhr.data.uf);
                    $('#city').val(xhr.data.city);
                    $('#neighborhood').val(xhr.data.neighborhood);
                    $('#street').val(xhr.data.street);
                    $('#number').focus();
                }
            });
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
