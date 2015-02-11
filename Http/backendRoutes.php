<?php

$router->get('/', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);