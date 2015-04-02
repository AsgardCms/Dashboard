<?php namespace Modules\Dashboard\Repositories\Cache;

use Modules\Core\Repositories\Cache\BaseCacheDecorator;
use Modules\Dashboard\Repositories\WidgetRepository;

class CacheWidgetDecorator extends BaseCacheDecorator implements WidgetRepository
{
    public function __construct(WidgetRepository $widgets)
    {
        parent::__construct();
        $this->entityName = 'dashboard.widgets';
        $this->repository = $widgets;
    }
}
