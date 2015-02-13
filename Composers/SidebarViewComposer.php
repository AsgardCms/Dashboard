<?php namespace Modules\Dashboard\Composers;

use Illuminate\Contracts\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;
use Modules\Core\Composers\BaseSidebarViewComposer;

class SidebarViewComposer extends BaseSidebarViewComposer
{
    public function compose(View $view)
    {
        $view->sidebar->group('Dashboard', function (SidebarGroup $group) {
            $group->weight = 0;
            $group->enabled = false;

            $group->addItem('Dashboard', function (SidebarItem $item) {
                $item->route('dashboard.index');
                $item->icon = 'fa fa-dashboard';
                $item->name = 'Dashboard';
                $item->authorize(
                    $this->auth->hasAccess('dashboard.index')
                );
            });

        });
    }
}
