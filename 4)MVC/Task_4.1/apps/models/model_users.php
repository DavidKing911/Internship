<?php
class Model_Users extends Model
{
	public function set_data($name, $age, $gender)
	{	
		$user = ",name " . $name . " age " . $age . " gender " . $gender . " ";
		file_put_contents("apps/db/users.txt", $user, FILE_APPEND);
	}

	public function get_users(string $usersData) {
		$users = explode(",", $usersData);
		foreach ($users as $key => $user) {
			$users[$key] = explode(" ", $user);
		}
		return $users;
	}
}