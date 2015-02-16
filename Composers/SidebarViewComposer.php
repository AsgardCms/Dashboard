<?php namespace Modules\Dashboard\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;
use Modules\Core\Composers\BaseSidebarViewComposer;

class SidebarViewComposer extends BaseSidebarViewComposer
{
    public function compose(View $view)
    {
        $view->sidebar->group(trans('dashboard::dashboard.name'), function (SidebarGroup $group) {
            $group->weight = 0;
            $group->hideHeading();

            $group->addItem(trans('dashboard::dashboard.name'), function (SidebarItem $item) {
                $item->icon = 'fa fa-dashboard';
                $item->route('dashboard.index');
                $item->authorize(
                    $this->auth->hasAccess('dashboard.index')
                );

                $prefix = config('asgard.core.core.admin-prefix');
                $item->isActiveWhen(
                    Request::is("*/{$prefix}")
                );
            });

        });
    }
}
