<?php namespace Modules\Dashboard\Composers;

use Illuminate\Contracts\View\View;

class WidgetViewComposer
{
    /**
     * @var array
     */
    private $subViews;

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with(['widgets' => $this->subViews]);
    }

    /**
     * Add the html of the widget view to the given widget name
     * @param string $name
     * @param string $view
     * @return $this
     */
    public function addSubview($name, $view)
    {
        $this->subViews[$name]['html'] = $view;

        return $this;
    }

    /**
     * Add the widget type to the given widget name
     * @param string $name
     * @param string $type
     * @return $this
     */
    public function addWidgetType($name, $type)
    {
        $this->subViews[$name]['type'] = $type;

        return $this;
    }
}
