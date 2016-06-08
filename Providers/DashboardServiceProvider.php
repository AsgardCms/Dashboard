<?php namespace Modules\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Dashboard\Entities\Widget;
use Modules\Dashboard\Repositories\Cache\CacheWidgetDecorator;
use Modules\Dashboard\Repositories\Eloquent\EloquentWidgetRepository;
use Modules\Workshop\Manager\StylistThemeManager;

class DashboardServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Modules\Dashboard\Repositories\WidgetRepository',
            function () {
                $repository = new EloquentWidgetRepository(new Widget());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new CacheWidgetDecorator($repository);
            }
        );
    }

    public function boot(StylistThemeManager $theme)
    {
        $this->publishes([
            __DIR__ . '/../Resources/views' => base_path('resources/views/asgard/dashboard'),
        ], 'views');

        $this->app['view']->prependNamespace(
            'dashboard',
            base_path('resources/views/asgard/dashboard')
        );
        $this->app['view']->prependNamespace(
            'dashboard',
            $theme->find(config('asgard.core.core.admin-theme'))->getPath() . '/views/modules/dashboard'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}
