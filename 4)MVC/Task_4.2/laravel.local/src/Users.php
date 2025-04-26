<?php

namespace Posts;

class Users
{
    private $name;
    private $age;
    private $gender;
    private $post;

    public function __construct($name = null, $age = null, $gender = null, $post = null) {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->post = $post;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    public function setGender($gender) {
        $this->gender = $gender;
    }

    public function setPost($post) {
        $this->post = $post;
    }
    public function ageCheck() 
    {
        if ($this->age < 10 && (strtolower($this->gender) == "мужской" || strtolower($this->gender) == "male")) {
			return 'Пользователь мужского пола младше 10 лет добавить пост не может!';
        }
    }

    public function getValidatedName() {
        if (strlen($this->name) > 20 || empty($this->name)) {
            return 'Имя должно содержать не более 20 символов';
        }
    }

    public function getValidatedAge() {
        if (!filter_var($this->age, FILTER_VALIDATE_INT)) {
            return 'Поле возраста не может быть пустым';
        } else if (strlen($this->age) > 2 || empty($this->age)) {
            return 'Возраст должен быть только двузначным числом';
        } else if ($this->age < 0) {
            return 'Возраст не может быть отрицательным числом';
        }
    }

    public function getValidatedGender() {
        if (strlen($this->gender) > 10 || empty($this->gender)) {
            return 'Пол должен быть не больше 10 символов';
        }
    }

    public function getValidatedPost() {
        if (strlen($this->post) > 1000 || empty($this->post)) {
            return 'Пост должен быть не больше 1000 символов';
        }
    }
}