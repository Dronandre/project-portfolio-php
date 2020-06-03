<?php

function updateUserAndGoToProfile($user){
    if (isset($_POST['updateProfile'])) {
        global $errors;
        if (trim($_POST['name']) === '') {
            $errors[] = ['title' => 'Введите имя'];
        }
        if (trim($_POST['surname']) === '') {
            $errors[] = ['title' => 'Введите фамилию'];
        }
        if (trim($_POST['email']) === '') {
            $errors[] = ['title' => 'Введите email'];
        }

        if (empty($errors)) {
            $user->name = htmlentities($_POST['name']);
            $user->surname = htmlentities($_POST['surname']);
            $user->email = htmlentities($_POST['email']);
            $user->city = htmlentities($_POST['city']);
            $user->country = htmlentities($_POST['country']);

            R::store($user);
            $_SESSION['logged_user'] = $user;  
            header('Location: ' . HOST . 'profile');
            exit();          
        }
    }
}


// Проверка на то что user вошел
    if ( isset($_SESSION['login']) && $_SESSION['login'] === 1) {
        
        if ($_SESSION['logged_user']['role'] === 'user') {
            $user = R::load('users', $_SESSION['logged_user']['id']);

            updateUserAndGoToProfile($user);            
            
        } else if ($_SESSION['logged_user']['role'] === 'admin') { 
            
            if (isset($uriArray[1])) {
                // Редактирование чужого профиля
                $user = R::load('users', intval($uriArray[1]));

                updateUserAndGoToProfile($user);                

            } else {
                $user = R::load('users', $_SESSION['logged_user']['id']);  
                
                updateUserAndGoToProfile($user);                
            }
        }
    } else {
        header('Location: ' . HOST . 'login');
        exit();
    }

// Проверка на роль пользователя


// Запрос данных из бд по пользователю

$pageTitle = "Профиль пользователя";


// ob_start();
// include ROOT . "templates/about/about.tpl";
// $content = ob_get_contents();
// ob_end_clean();

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/profile/profile-edit.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";