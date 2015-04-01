<?php namespace Modules\Dashboard\Http\Controllers\Admin;

use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Pingpong\Modules\Repository;

class DashboardController extends AdminBaseController
{
    public function __construct(Repository $modules)
    {
        parent::__construct();
        $this->bootWidgets($modules);
    }

    public function index()
    {
        $this->assetPipeline->requireJs('lodash.js');
        $this->assetPipeline->requireJs('jquery-ui-core.js');
        $this->assetPipeline->requireJs('jquery-ui-widget.js');
        $this->assetPipeline->requireJs('jquery-ui-mouse.js');
        $this->assetPipeline->requireJs('jquery-ui-draggable.js');
        $this->assetPipeline->requireJs('jquery-ui-resizable.js');
        $this->assetPipeline->requireJs('gridstack.js');
        $this->assetPipeline->requireCss('gridstack.css')->before('asgard.css');

        return view('dashboard::admin.dashboard');
    }

    /**
     * Boot widgets for all enabled modules
     * @param Repository $modules
     */
    private function bootWidgets(Repository $modules)
    {
        foreach ($modules->enabled() as $module) {
            if (! $module->widgets) {
                continue;
            }
            foreach ($module->widgets as $widgetClass) {
                app($widgetClass)->boot();
            }
        }
    }
}
