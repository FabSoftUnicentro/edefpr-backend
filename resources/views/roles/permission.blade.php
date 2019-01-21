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
                <p>Selecione o papel para atribuição/desatribuição de permissão<p/>
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
        $('#selectOpt').click(function() {
            var selectedRole = $('#selectOpt');
            var permissionDiv = $('#permissions');
            var roleId = selectedRole.val();

            $("#chkPassport").click(function () {
                if ($(this).is(":checked")) {
                    $("#dvPassport").show();
                } else {
                    $("#dvPassport").hide();
                }
            });

            $.ajax ({
                method: 'GET',
                url: '{{ route('roles.permissions', '_role') }}'.replace('_role', roleId),
                success: function(data) {
                    $.each(data, function(i, val) {
                        if (val.chosen) {
                            permissionDiv.append('<input id="'+val.id+'" type="checkbox" ' +
                                'onclick="check_uncheck_checkbox(id)" checked>'+val.name+'<br/>');
                        } else {
                            permissionDiv.append('<input id="'+val.id+'" type="checkbox" ' +
                                'onclick="check_uncheck_checkbox(id)"/>'+val.name+'<br/>');
                        }
                    });
                },
                error: function(data) {

                }
            });
        });

        function check_uncheck_checkbox(permissionId) {
            var selectedRole = $('#selectOpt');
            var roleId = selectedRole.val();

            if(document.getElementById(permissionId).checked) {
                $.ajax({
                    method: 'PUT',
                    url: '{{ route('roles.assign.permission', ['_role', '_permissionId']) }}'.replace('_role',  roleId).replace('_permissionId', permissionId),
                });
            }
            else {
                $.ajax({
                    method: 'PUT',
                    url: '{{ route('roles.unassign.permission', ['_role', '_permissionId']) }}'.replace('_role',  roleId).replace('_permissionId', permissionId),
                });
            }
        }
    </script>
@endsection
