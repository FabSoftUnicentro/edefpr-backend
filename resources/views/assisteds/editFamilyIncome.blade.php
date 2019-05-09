@extends('adminlte::page')

@section('title', 'Editar Renda Familiar')

@section('css')
@endsection

@section('content_header')
    @include('helpers.flash-message')
    <h1>Editar renda familiar</h1>
@stop

@section('content')
    @include('familyIncomes._form', [
        'form' => $form
    ])
@stop

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" type="text/javascript"></script>
    <script>
        $(function() {
            $('.money').maskMoney({
                thousands: '.',
                decimal: ','
            });
        })
    </script>
@endsection