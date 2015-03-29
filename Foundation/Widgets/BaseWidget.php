<?php namespace Modules\Dashboard\Foundation\Widgets;

use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;

abstract class BaseWidget
{
    /**
     * Boot the widget and add the data to the dashboard view composer
     */
    public function boot()
    {
        $widgetViewComposer = app('Modules\Dashboard\Composers\WidgetViewComposer');
        /** @var \Illuminate\Contracts\View\Factory $view */
        $view = app('Illuminate\Contracts\View\Factory');

        if ($view->exists($this->view())) {
            $html = $view->make($this->view())
                         ->with($this->data())
                         ->render();

            $widgetViewComposer
                ->addSubView($this->name(), $html)
                ->addWidgetType($this->name(), $this->type());
        }

        $view->composer('dashboard::admin.dashboard', 'Modules\Dashboard\Composers\WidgetViewComposer');
    }

    /**
     * Get the widget name
     * @return string
     */
    abstract protected function name();

    /**
     * Get the widget type
     * @return string
     */
    abstract protected function type();

    /**
     * Get the widget view
     * @return string
     */
    abstract protected function view();

    /**
     * Get the widget data to send to the view
     * @return string
     */
    abstract protected function data();
}
