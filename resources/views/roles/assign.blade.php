@extends('adminlte::page')

@section('title', 'Visualizar nível de Acesso')

@section('css')
@endsection

@section('content_header')
    <h1>Nível de Acesso</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-12">
                <p>Selecione o funcionário para atribuição/desatribuição de permissão<p/>
                <select id="selectOpt">
                    <option></option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}"> {{ $role->description }} </option>
                    @endforeach
                </select>
                <div class="col-md-12" id="permissions"/>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#selectOpt').on('change', function() {
            var selectedRole = $('#selectOpt');
            var roleId = selectedRole.val();

            if (roleId) {
                $.ajax({
                    method: 'GET',
                    url: '{{ route('roles.permissions', '_role') }}'.replace('_role', roleId),
                    success: function (data) {
                        $("#permissions").html(data);
                    },
                    error: function (data) {

                    }
                });
            } else {
                $('#permissions').html('');
            }

        });
    </script>
@endsection
