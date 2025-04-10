<?php
class Route
{
	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		
		$routes = explode('/Internship/4)MVC/Task_4.1/', $_SERVER['REQUEST_URI']);

		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'. ucfirst($controller_name);
		$action_name = 'action_'.$action_name;

		echo $controller_name . '</br>';
		echo $action_name  . '</br>';

		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "../models/".$model_file;
		if(file_exists($model_path))
		{
			include "../models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name);
		$controller_path = "apps/controllers/".$controller_file;

		if(file_exists($controller_path))
		{
			include $controller_path;
		}
		else
		{
			// Route::ErrorPage404();
		}
		// создаем контроллер
		$controller = new (mb_substr($controller_name, 0, -4));
		$action = $action_name;
		
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}
		else
		{
			// Route::ErrorPage404();
		}
	
	}
	
	// static function ErrorPage404()
	// {
    //     $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
    //     header('HTTP/1.1 404 Not Found');
	// 	header("Status: 404 Not Found");
	// 	header('Location:'.$host.'404');
    // }
}