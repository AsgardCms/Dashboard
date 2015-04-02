<?php namespace Modules\Dashboard\Foundation\Widgets;

use Illuminate\Contracts\View\Factory;

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
                ->setWidgetName($this->name())
                ->addSubView($this->name(), $html)
                ->addWidgetOptions($this->name(), $this->options());
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
    abstract protected function options();

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
