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

    /**
     * Find the saved state of widgets for the given user id
     * @param int $userId
     * @return string
     */
    public function findForUser($userId)
    {
        return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.findForUser.{$userId}", $this->cacheTime,
                function () use ($userId) {
                    return $this->repository->findForUser($userId);
                }
            );
    }
}
