<?php

get('/', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);

$router->group(['prefix' => '/dashboard'], function () {
    post('grid', ['as' => 'dashboard.grid.save', 'uses' => 'DashboardController@save']);
    get('grid', ['as' => 'dashboard.grid.reset', 'uses' => 'DashboardController@reset']);
});
