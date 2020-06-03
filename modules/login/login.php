<?php

$pageTitle = "Вход на сайт";
$pageClass = "authorization-page";


if (isset($_POST['login'])) {
    if (trim($_POST['email'] == '')) {
        $errors[] = ['title' => 'Введите email', 'desc' => '<p>Email обязателен при регистрации на сайте</p>'];
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = ['title' => 'Введите корректный Email'];
    }
    if (trim($_POST['password'] == '')) {
        $errors[] = ['title' => 'Введите пароль'];
    } else if (strlen($_POST['password']) <= 4) {
        $errors[] = ['title' => 'Пароль должен быть больше 4-х символов'];
    }

    if (empty($errors)) {
        $user = R::findOne('users', 'email = ?', array($_POST['email']));

        if ($user) {
            if (password_verify($_POST['password'], $user->password)) {
                // $success[] = ['title' => 'Верный пароль'];
                // Автологин пользователя
                $_SESSION['logged_user'] = $user;
                $_SESSION['login'] = 1;
                $_SESSION['role'] = $user->role;

                header('Location:' . HOST . "profile");
                exit();
            } else {
                $errors[] = ['title' => 'Неверный пароль'];
            }
        } else {
            $errors[] = ['title' => 'Неверный Email'];
        }
    }
}



ob_start();
include ROOT . "templates/login/form-login.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/login/login-page.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";
