<div class="row">
    <p>Permissões específicas do cargo</p>
    @foreach($rolePermissions as $rolePermission)
        <div class="col-md-4">
            <input type="checkbox" checked disabled />
            {{ $rolePermission['description'] }}
        </div>
    @endforeach
    <br/>
</div>

<div class="row">
    <br/>
    <p>Permissões específicas do funcionário</p>
    @foreach($permissions as $permission)
        @if ($permission['chosen'])
            <div class="col-md-4">
                <input id="permission-{{ $permission['id'] }}" type="checkbox" onclick="check_uncheck_checkbox({{ $permission['id'] }})" checked />
                {{ $permission['description'] }}
            </div>
        @else
            <div class="col-md-4">
                <input id="permission-{{ $permission['id'] }}" type="checkbox" onclick="check_uncheck_checkbox({{ $permission['id'] }})" />
                {{ $permission['description'] }}
            </div>
        @endif
    @endforeach
</div>

<script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    function check_uncheck_checkbox(permissionId) {
        if (!$('input[type=checkbox]').prop('checked')) {
            $.ajax({
                method: 'PUT',
                url: '{{ route('users.unassign.permission', ['_user', '_permissionId']) }}'.replace('_user',  {{ $user->id }}).replace('_permissionId', permissionId),
            });
        }
        else {
            $.ajax({
                method: 'PUT',
                url: '{{ route('users.assign.permission', ['_user', '_permissionId']) }}'.replace('_user',  {{ $user->id }}).replace('_permissionId', permissionId),
            });
        }
    }
</script>
