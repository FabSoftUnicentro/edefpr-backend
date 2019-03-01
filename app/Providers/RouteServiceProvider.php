<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAssistedRoutes();

        $this->mapAttendmentRoutes();

        $this->mapAttendmentTypeRoutes();

        $this->mapPermissionRoutes();

        $this->mapPostcodeRoutes();

        $this->mapRoleRoutes();

        $this->mapUserRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/api.php'));
    }

    protected function mapAssistedRoutes()
    {
        Route::prefix('assisteds')
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace . '\Assisted')
            ->group(base_path('routes/web/assisted.php'));
    }

    protected function mapAttendmentRoutes()
    {
        Route::prefix('attendments')
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace . '\Attendment')
            ->group(base_path('routes/web/attendment.php'));
    }

    protected function mapAttendmentTypeRoutes()
    {
        Route::prefix('attendment-type')
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace . '\AttendmentType')
            ->group(base_path('routes/web/attendment_type.php'));
    }

    protected function mapPermissionRoutes()
    {
        Route::prefix('permissions')
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace . '\Permission')
            ->group(base_path('routes/web/permission.php'));
    }

    protected function mapPostcodeRoutes()
    {
        Route::prefix('postcode')
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace . '\Postcode')
            ->group(base_path('routes/web/postcode.php'));
    }

    protected function mapRoleRoutes()
    {
        Route::prefix('roles')
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace . '\Role')
            ->group(base_path('routes/web/role.php'));
    }

    protected function mapUserRoutes()
    {
        Route::prefix('users')
            ->middleware(['web', 'auth'])
            ->namespace($this->namespace . '\User')
            ->group(base_path('routes/web/user.php'));
    }
}
