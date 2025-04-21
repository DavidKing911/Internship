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
		$users = $this->model->get_data();
		$this->view->generate("users_view.php", $users);
	}

    function action_setData()
	{
        $user = $this->model->set_data($_POST['name'], $_POST['age'], $_POST['gender']);
		if ($user == null) {
			echo "Пользователь слишком молод для добавления в базу данных!";
		} else if (is_array($user)) {
			foreach ($user as $error) {
				echo $error;
			}
		} else {
			echo "<b>Пользователь успешно добавлен</b></br>";
			file_put_contents("apps/db/users.txt", $user, FILE_APPEND);
		}
		$this->view->generate("response_view.php");
	}


}