<?php
class Model_Users extends Model
{
	public function set_data($name, $age, $gender): string|null|array
	{	
		if ($age < 10 && (strtolower($gender) == "мужской" || strtolower($gender) == "male")) {
			return null;
		} else {
			$arr_errors = user_verification($name, $age, $gender);
			if (empty($arr_errors)) {
				$user = ",name " . $name . " age " . $age . " gender " . $gender . " ";
				return add_user_method($user);
			} else {
				return $arr_errors;
			}
		}
	
	}

	public function get_data(): array {
		return get_users_method();
	}
}