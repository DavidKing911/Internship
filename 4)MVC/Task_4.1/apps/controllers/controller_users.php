<?php

class Controller_Users extends Controller
{
	private $usersData;
	
    function __construct(array $model_users, string $str)
	{
		$this->model = $model_users[0];
		$this->view = $model_users[1];
		$this->usersData = $str;
	}

	function action_getData()
	{
		$users = $this->model->get_users($this->usersData);
		$this->view->generate("users_view.php", $users);
	}

    function action_setData()
	{
        $this->model->set_data($_POST['name'], $_POST['age'], $_POST['gender']);
		$this->view->generate("response_view.php");
	}


}