<?php

class Controller_Users extends Controller
{
    function __construct()
	{
		$this->model = new Model_Users();
		$this->view = new View();
	}

	function action_getData()
	{
        $users = $this->model->get_users();
		$this->view->generate("users_view.php", $users);
	}

    function action_setData()
	{
        $this->model->set_data($_POST['name'], $_POST['age'], $_POST['gender']);
		$this->view->generate("response_view.php");
	}

}