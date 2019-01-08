<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$this->get('/', 'Dashboard\DashboardIndex')->name('dashboard');

// User routes
$this->group(['middleware' => ['auth'], 'namespace' => 'User', 'prefix' => 'users'], function () {
    $this->get('/me', 'UserInfo')->name('user.profile');
    $this->put('/me', 'UserInfoUpdate')->name('user.profile.update');

    $this->group(['middleware' => ['permission:register-employee']], function () {
        $this->get('/create', 'UserCreate')->name('users.create');
        $this->post('/', 'UserStore')->name('users.store');
    });
    $this->group(['middleware' => ['permission:assign-user-permission']], function () {
        $this->put('/{user}/assign-permission/{permission}', 'UserAssignPermission')->name('users.assign.permission');
        $this->put('/{user}/assign-permissions', 'UserAssignPermissions')->name('users.assign.permissions');
        ;
    });
    $this->group(['middleware' => ['permission:unassign-user-permission']], function () {
        $this->put('/{user}/unassign-permission/{permission}', 'UserUnassignPermission')->name('users.unassign.permission');
        ;
        $this->put('/{user}/unassign-permissions', 'UserUnassignPermissions')->name('users.unassign.permissions');
        ;
    });
    $this->group(['middleware' => ['permission:assign-user-role']], function () {
        $this->put('/{user}/assign-role/{role}', 'UserAssignRole')->name('users.assign.role');
        ;
    });
    $this->group(['middleware' => ['permission:unassign-user-role']], function () {
        $this->put('/{user}/unassign-role/{role}', 'UserUnassignRole')->name('users.assign.role');
        ;
    });
    $this->group(['middleware' => ['permission:update-employee']], function () {
        $this->get('/{user}/edit', 'UserEdit')->name('users.edit');
        $this->put('/{user}', 'UserUpdate')->name('users.update');
    });
    $this->group(['middleware' => ['permission:read-employee']], function () {
        $this->get('/list', 'UserList')->name('users.list');
        $this->get('/', 'UserIndex')->name('users.index');
        $this->get('/{user}', 'UserShow')->name('users.show');
    });
    $this->group(['middleware' => ['permission:delete-employee']], function () {
        $this->delete('/{user}', 'UserDestroy')->name('users.destroy');
    });
});

// Assisted routes
$this->group(
    ['middleware' => ['auth'], 'namespace' => 'Assisted', 'prefix' => 'assisteds'],
    function () {
    
        $this->group(['middleware' => ['permission:register-assisted']], function () {
            $this->get('/create', 'AssistedCreate')->name('assisteds.create');
            $this->post('/', 'AssistedStore')->name('assisteds.store');
        });

        $this->group(['middleware' => ['permission:update-assisted']], function () {
            $this->get('/{assisted}/edit', 'AssistedEdit')->name('assisteds.edit');
            $this->put('/{assisted}', 'AssistedUpdate')->name('assisteds.update');
        });

        $this->group(['middleware' => ['permission:read-assisted']], function () {
            $this->get('/list', 'AssistedIndex')->name('assisteds.index');
            $this->get('/{assisted}', 'AssistedShow')->name('assisteds.show');
        });

        $this->group(['middleware' => ['permission:delete-assisted']], function () {
            $this->delete('/{assisted}', 'AssistedDestroy')->name('assisteds.destroy');
        });
    }
);

// Role routes
$this->group(
    ['middleware' => ['auth'], 'namespace' => 'Role', 'prefix' => 'roles'],
    function () {
    
        $this->group(['middleware' => ['permission:register-role']], function () {
            $this->get('/create', 'RoleCreate')->name('roles.create');
            $this->post('/', 'RoleStore')->name('roles.store');
        });

        $this->group(['middleware' => ['permission:update-role']], function () {
            $this->get('/{role}/edit', 'RoleEdit')->name('roles.edit');
            $this->put('/{role}', 'RoleUpdate')->name('roles.update');
        });

        $this->group(['middleware' => ['permission:read-role']], function () {
            $this->get('/list', 'RoleIndex')->name('roles.index');
            $this->get('/{role}', 'RoleShow')->name('roles.show');
        });

        $this->group(['middleware' => ['permission:delete-role']], function () {
            $this->delete('/{role}', 'RoleDestroy')->name('roles.destroy');
        });
    }
);

// Postcode routes
$this->group(['middleware' => ['auth'], 'namespace' => 'Postcode', 'prefix' => 'postcode'], function () {
    $this->get('/{postcode}', 'PostcodeSearch')->name('postcode.search');
});

$this->get('/page-not-found', function () {
    return view('error.404');
})->name('404');

$this->get('/internal-server-error', function () {
    return view('error.500');
})->name('500');

// Permission Routes
$this->group(['middleware' => ['auth'], 'namespace' => 'Permission', 'prefix' => 'permission'], function () {
    $this->group(['middleware' => ['permission:register-permission']], function () {
        $this->get('/create', 'PermissionCreate')->name('permissions.create');
        $this->post('/', 'PermissionStore')->name('permissions.store');
    });

    $this->group(['middleware' => ['permission:update-permission']], function () {
        $this->get('/{permission}/edit', 'PermissionEdit')->name('permissions.edit');
        $this->put('/{permission}', 'PermissionUpdate')->name('permissions.update');
    });

    $this->group(['middleware' => ['permission:list-permission']], function () {
        $this->get('/list', 'PermissionIndex')->name('permissions.index');
        $this->get('/{permission}', 'PermissionShow')->name('permissions.show');
    });

    $this->group(['middleware' => ['permission:delete-permission']], function () {
        $this->delete('/{permission}', 'PermissionDestroy')->name('permissions.destroy');
    });
});

Auth::routes();

// AttendmentType routes
$this->group(
    ['middleware' => ['auth'], 'namespace' => 'AttendmentType', 'prefix' => 'attendment-type'],
    function () {
        $this->group(['middleware' => ['permission:register-attendmentType']], function () {
            $this->get('/create', 'AttendmentTypeCreate')->name('attendmentTypes.create');
            $this->post('/', 'AttendmentTypeStore')->name('attendmentTypes.store');
        });

        $this->group(['middleware' => ['permission:update-attendmentType']], function () {
            $this->get('/{attendmentType}/edit', 'AttendmentTypeEdit')->name('attendmentTypes.edit');
            $this->put('/{attendmentType}', 'AttendmentTypeUpdate')->name('attendmentTypes.update');
        });

        $this->group(['middleware' => ['permission:list-attendmentType']], function () {
            $this->get('/list', 'AttendmentTypeIndex')->name('attendmentTypes.index');
            $this->get('/{attendmentType}', 'AttendmentTypeShow')->name('attendmentTypes.show');
        });

        $this->group(['middleware' => ['permission:delete-attendmentType']], function () {
            $this->delete('/{attendmentType}', 'AttendmentTypeDestroy')->name('attendmentTypes.destroy');
        });
    }
);

// Attendment routes
$this->group(
    ['middleware' => ['auth'], 'namespace' => 'Attendment', 'prefix' => 'attendment'],
    function () {
        $this->group(['middleware' => ['permission:register-attendment']], function () {
            $this->get('/create', 'AttendmentCreate')->name('attendments.create');
            $this->post('/', 'AttendmentStore')->name('attendments.store');
        });

        $this->group(['middleware' => ['permission:update-attendment']], function () {
            $this->get('/{attendment}/edit', 'AttendmentEdit')->name('attendments.edit');
            $this->put('/{attendment}', 'AttendmentUpdate')->name('attendments.update');
        });

        $this->group(['middleware' => ['permission:list-attendment']], function () {
            $this->get('/list', 'AttendmentIndex')->name('attendments.index');
            $this->get('/{attendment}', 'AttendmentShow')->name('attendments.show');
        });
        $this->group(['middleware' => ['permission:delete-attendment']], function () {
            $this->delete('/{attendment}', 'AttendmentDestroy')->name('attendments.destroy');
        });
    }
);
