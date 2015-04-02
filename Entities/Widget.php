<?php namespace Modules\Dashboard\Entities;

class Widget
{
    protected $fillable = ['widgets', 'user_id'];
    protected $table = 'dashboard__widgets';

    public function user()
    {
        $driver = config('asgard.user.users.driver');

        return $this->belongsTo("Modules\\User\\Entities\\{$driver}\\User");
    }
}
