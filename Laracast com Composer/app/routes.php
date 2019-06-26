<?php


$router->get('', 'HomeController@index');

$router->get('tasks', 'TaskController@index');

$router->get('tasks/show', 'TaskController@show');

$router->get('tasks/create', 'TaskController@create');

$router->get('tasks/edit', 'TaskController@edit');

$router->post('tasks/store', 'TaskController@store');

$router->post('tasks/update', 'TaskController@update');

$router->get('tasks/delete', 'TaskController@destroy');