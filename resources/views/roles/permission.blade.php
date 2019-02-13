<div class="row">
    <br/>
    <p>Permissões do cargo</p>
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

<script src="//unpkg.com/sweetalert/dist/sweetalert.min.js"/>
<script>
    function check_uncheck_checkbox(permissionId) {
        if (!$('input[type=checkbox]').prop('checked')) {
            $.ajax({
                method: 'PUT',
                url: '{{ route('roles.unassign.permission', ['_role', '_permissionId']) }}'.replace('_role',  {{ $role->id }}).replace('_permissionId', permissionId),
            });
        }
        else {
            $.ajax({
                method: 'PUT',
                url: '{{ route('roles.assign.permission', ['_role', '_permissionId']) }}'.replace('_role',  {{ $role->id }}).replace('_permissionId', permissionId),
            });
        }
    }
</script>
