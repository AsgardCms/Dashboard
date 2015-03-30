<?php namespace Modules\Dashboard\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DashboardController extends AdminBaseController
{
    public function index()
    {
        $this->assetPipeline->requireJs('gridstack.js');
        $this->assetPipeline->requireCss('gridstack.css')->before('asgard.css');

        return view('dashboard::admin.dashboard');
    }
}
