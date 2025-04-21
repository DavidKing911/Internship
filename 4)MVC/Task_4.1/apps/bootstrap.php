<?php
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
Route::start(); // запускаем маршрутизатор

function get_users_method() {
    $file_content = file_get_contents("apps/db/users.txt");
    $users = explode(",", $file_content);
    foreach ($users as $key => $user) {
        $users[$key] = explode(" ", $user);
    }
    return $users;
}

function add_user_method(string $usersData) {
    return file_put_contents("apps/db/users.txt", $usersData, FILE_APPEND);
}

function user_verification($name, $age, $gender): array {
    $err = [];
    $name = clear_data($name);
    $age = clear_data($age);
    $gender = clear_data($gender);

    if (strlen($name) > 20 || empty($name)) {
        $err[] = '<small class="text-danger">Имя должно быть не больше 15 символов</small></br>';
    }
    if (!filter_var($age, FILTER_VALIDATE_INT) || strlen($age) > 2) {
        $err[] = '<small class="text-danger">Поле возраста не может быть пустым</small></br>';
    } else if (empty($age)) {
        $err[] = '<small class="text-danger">Возраст должен быть только двузначным числом</small></br>';
    }
    if (strlen($gender) > 15 || empty($gender)) {
        $err[] = '<small class="text-danger">Пол должен быть не больше 10 символов</small></br>';
    }
    return $err;
}

function clear_data($value): string {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);
    return $value;
}