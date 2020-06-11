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
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home'; 

    /**
     * Consumer Home path
     *
     * @var string
     */
    public const CONSUMERHOME = '/consumer/home';
    
    /**
     * Provider Home path
     *
     * @var string
     */
    public const PROVIDERHOME = '/provider/home'; /**


     * Provider Admin path
     *
     * @var string
     */
    public const ADMINHOME = '/admin/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

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

        $this->mapConsumerRoutes();
        
        $this->mapProviderRoutes();

        $this->mapAdminRoutes();

        //
    }
    /**
     * Admin Routes
     * 
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->prefix('admin')
             ->group(base_path('routes/admin.php'));
    }
    /**
     * Service Consumer Routes
     * 
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapConsumerRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->prefix('consumer')
             ->group(base_path('routes/consumer.php'));
    }

    /**
     * Service Provider Routes
     * 
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapProviderRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->prefix('provider')
             ->group(base_path('routes/provider.php'));
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
             ->group(base_path('routes/web.php'));
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
             ->group(base_path('routes/api.php'));
    }
}
