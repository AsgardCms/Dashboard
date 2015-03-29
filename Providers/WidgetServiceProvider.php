<?php namespace Modules\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Dashboard\Composers\WidgetViewComposer;

class WidgetServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->singleton('Modules\Dashboard\Composers\WidgetViewComposer', function () {
            return new WidgetViewComposer();
        });
    }

    public function boot()
    {
        foreach ($this->app['modules']->enabled() as $module) {
            if ( ! $module->widgets) {
                continue;
            }
            foreach ($module->widgets as $widgetClass) {
                app($widgetClass)->boot();
            }
        }
    }
}
