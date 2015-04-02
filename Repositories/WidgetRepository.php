<?php namespace Modules\Dashboard\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface WidgetRepository extends BaseRepository
{
    /**
     * Find the saved state of widgets for the given user id
     * @param int $userId
     * @return string
     */
    public function findForUser($userId);
}
