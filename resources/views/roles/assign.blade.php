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
                <select id="selectOpt">
                <option></option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}"> {{ $role->description }} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 permissions" id="permissions">

            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('#selectOpt').on('change', function () {
            var selectedRole = $('#selectOpt');
            var permissionDiv = $('#permissions');
            var roleId = selectedRole.val();

            $.ajax ({
                method: 'GET',
                url: '{{ route('roles.permissions', '_role') }}'.replace('_role', roleId),
                success: function(data) {
                    $.each(data, function(i, val) {
                        if (val.chosen) {
                            permissionDiv.append('<input type="checkbox" checked onclick="fogoNaBabilonia()">' + val.name + '</br>');
                        } else {
                            permissionDiv.append('<input type="checkbox" onclick="fogoNaBabilonia()"/>' + val.name + '</br>');
                        }
                    });
                },
                error: function(data) {

                }
            });
        });

        function fogoNaBabilonia () {
            alert("DJ CLEITON RASTA AO SOM DO CABEÇA DE GELO OLHA PEDRA")
        }
    </script>
@endsection