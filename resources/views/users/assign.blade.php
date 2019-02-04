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
                    @foreach($users as $user)
                        <option value="{{ $user->id }}"> {{ $user->name }} </option>
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
            var selectedUser = $('#selectOpt');
            var permissionDiv = $('#permissions');
            var UserId = selectedUser.val();
            $("#chkPassport").click(function () {
                if ($(this).is(":checked")) {
                    $("#dvPassport").show();
                } else {
                    $("#dvPassport").hide();
                }
            });
            $.ajax ({
                method: 'GET',
                url: '{{ route('users.permissions', '_user') }}'.replace('_user', UserId),
                success: function(data) {
                    $.each(data, function(i, val) {
                        if (val.chosen) {
                            permissionDiv.append('<input id="'+val.id+'" type="checkbox" ' +
                                'onclick="check_uncheck_checkbox(id)" checked>'+val.description+'<br/>');
                        } else {
                            permissionDiv.append('<input id="'+val.id+'" type="checkbox" ' +
                                'onclick="check_uncheck_checkbox(id)"/>'+val.description+'<br/>');
                        }
                    });
                },
                error: function(data) {
                }
            });
        });
        function check_uncheck_checkbox(permissionId) {
            var selectedUser = $('#selectOpt');
            var userId = selectedUser.val();
            if (document.getElementById(permissionId).checked) {
                $.ajax({
                    method: 'PUT',
                    url: '{{ route('users.assign.permission', ['_user', '_permissionId']) }}'.replace('_user',  userId).replace('_permissionId', permissionId),
                });
            }
            else {
                $.ajax({
                    method: 'PUT',
                    url: '{{ route('users.unassign.permission', ['_user', '_permissionId']) }}'.replace('_user',  userId).replace('_permissionId', permissionId),
                });
            }
        }
    </script>
@endsection
