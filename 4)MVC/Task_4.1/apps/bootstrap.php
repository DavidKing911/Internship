<?php
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
require_once 'models/model_users.php';
$model = new Model_Users();
$view = new View();
$model_users = [$model, $view];
Route::start($model_users); // запускаем маршрутизатор