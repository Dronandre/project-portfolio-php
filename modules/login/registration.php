<?php

$pageTitle = "Регистрация";
$pageClass = "authorization-page";


if(isset($_POST['register'])){
    if(trim($_POST['email'] == '')){
        $_SESSION['errors'][] = ['title' => 'Введите email', 'desc' => '<p>Email обязателен при регистрации на сайте</p>'];
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors'][] = ['title' => 'Введите корректный Email'];
    }    
    if(trim($_POST['password'] == '' )){
        $_SESSION['errors'][] = ['title' => 'Введите пароль'];
    } else if (strlen($_POST['password']) <= 4){
        $_SESSION['errors'][] = ['title' => 'Пароль должен быть больше 4-х символов'];
    }

    // Проверка что пользователь еще не зарегистрирован    
    if (R::count('users', 'email = ?', array($_POST['email'])) > 0) {
        $_SESSION['errors'][] = [
            'title' => 'Пользователь с таким Email уже зарегистрирован', 
            'desc' => '<p>Используйте другой Email адрес, или воспользуйтесь 
            <a href="'.HOST.'lost-password"> восстановлением пароля</a> .</p>'];        
    }

    // Добавление в бд
    if( empty($_SESSION['errors']) ) {
        $user = R::dispense('users');
        $user->email = $_POST['email'];
        $user->role = 'user';
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $result = R::store($user);
        if (is_int($result)) {
            // Автологин пользователя
            $_SESSION['logged_user'] = $user;
            $_SESSION['login'] = 1;
            $_SESSION['role'] = $user->role;

            $_SESSION['success'][] = [
                'title' => 'Регистрация завершена', 
                'desc' => '<p>Заполните свой профиль для дальнейшего использования сайтом.</p>'];  

            header('Location:' . HOST . "profile-edit");
            exit();
        } else {
            $_SESSION['errors'][] = ['title' => 'Что-то пошло не так.Повторите действие заново'];
        }
    }
}

ob_start();
include ROOT . "templates/login/form-registration.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/login/login-page.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";