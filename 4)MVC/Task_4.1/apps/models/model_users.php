<?php
class Model_Users extends Model
{
	public function setData($name, $age, $gender): string|null|array
	{	
		if ($age < 10 && (strtolower($gender) == "мужской" || strtolower($gender) == "male")) {
			return null;
		} else {
			$arr_errors = userVerification($name, $age, $gender);
			if (empty($arr_errors)) {
				$user = ",name " . $name . " age " . $age . " gender " . $gender . " ";
				return addUserMethod($user);
			} else {
				return $arr_errors;
			}
		}
	
	}

	public function getData(): array {
		return getUsersMethod();
	}
}