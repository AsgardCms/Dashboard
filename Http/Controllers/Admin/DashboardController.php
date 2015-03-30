<?php namespace Modules\Dashboard\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DashboardController extends AdminBaseController
{
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
}
