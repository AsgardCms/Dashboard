<?php namespace Modules\Dashboard\Repositories\Eloquent;

use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Dashboard\Repositories\WidgetRepository;

class EloquentWidgetRepository extends EloquentBaseRepository implements WidgetRepository
{
    /**
     * Find the saved state of widgets for the given user id
     * @param int $userId
     * @return string
     */
    public function findForUser($userId)
    {
        return $this->model->whereUserId($userId)->first();
    }
}
