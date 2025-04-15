<?php
class Model_Users extends Model
{
	private $users = [["name" => "John","age" => 33,"gender" => "male"]];

	public function set_data($name, $age, $gender)
	{	
		$this->users[] = ["name" => $name,"age" => $age,"gender" => $gender];
	}


	public function get_users() {
		return $this->users;
	}
}