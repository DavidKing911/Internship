<?php
class Route
{
	static function start($model_users)
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);


		// получаем имя контроллера
		if ( !empty($routes[3]) )
		{	
			$controller_name = $routes[3];
		}
		
		// получаем имя экшена
		if ( !empty($routes[4]) )
		{
			$action_name = $routes[4];
		}


		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'. ucfirst($controller_name);
		$action_name = 'action_'.$action_name;

		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "apps/models/".$model_file;
		
		if(file_exists($model_path))
		{
			if ($model_name != "Model_users") {
				include "apps/models/".$model_file;
			}
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name);
		$controller_path = "apps/controllers/".$controller_file.".php";
		if(file_exists($controller_path))
		{
			include $controller_path;
		}
		else
		{
			Route::ErrorPage404();
		}
		// создаем контроллер
		if ($controller_name == "Controller_Users") {
			$filename = "apps/db/users.txt";
			$file_content = file_get_contents($filename);
			$controller = new $controller_name($model_users, $file_content);
			$action = $action_name;
		} else {
			$controller = new $controller_name;
			$action = $action_name;
		}


		if(method_exists($controller, $action))
		{
			$controller->$action();
		}
		else
		{
			Route::ErrorPage404();
		}
	
	}
	
	static function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}