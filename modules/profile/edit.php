<?php

function updateUserAndGoToProfile($user){
    if (isset($_POST['updateProfile'])) {
        
        if (trim($_POST['name']) === '') {
            $_SESSION['errors'][] = ['title' => 'Введите имя'];
        }
        if (trim($_POST['surname']) === '') {
            $_SESSION['errors'][] = ['title' => 'Введите фамилию'];
        }
        if (trim($_POST['email']) === '') {
            $_SESSION['errors'][] = ['title' => 'Введите email'];
        }

        if (empty($_SESSION['errors'])) {
            $user->name = htmlentities($_POST['name']);
            $user->surname = htmlentities($_POST['surname']);
            $user->email = htmlentities($_POST['email']);
            $user->city = htmlentities($_POST['city']);
            $user->country = htmlentities($_POST['country']);

            // Работа с изображением аватара

            if (isset($_FILES['avatar']['name']) && $_FILES['avatar']['name'] !== '') {
                // Записываем паарметры файла в переменную
                $fileName = $_FILES['avatar']['name'];
                $fileTmpLoc = $_FILES['avatar']['tmp_name'];
                $fileType = $_FILES['avatar']['type'];
                $fileSize = $_FILES['avatar']['size'];
                $fileErrorMsg = $_FILES['avatar']['error'];
                $kaboom = explode('.' , $fileName);
                $fileExt = end($kaboom);

                // Проверка файла на корректность
                list($width, $height) = getimagesize($fileTmpLoc);
                if ($width < 160 || $height < 160) {
                    $_SESSION['errors'][] = [
                        'title' => 'Изображение слишком малого размера.',
                        'desc' => '<p>Загрузите изображение побольше.</p>'
                    ];
                }

                if ($fileSize > 4194304) {
                    $_SESSION['errors'][] = [
                        'title' => 'Изображение слишком боль размера.',
                        'desc' => '<p>Загрузите изображение поменьше.</p>'
                    ];
                }

                if (!preg_match("/\.(gif|jpg|jpeg|png)$/i", $fileName)) {
                    $_SESSION['errors'][] = [
                        'title' => 'Неверный формат файла.',
                        'desc' => '<p>Файл изображения должен быть в формате gif, jpg, jpeg, или png.</p>'
                    ];
                }

                if ($fileErrorMsg == 1) {
                    $_SESSION['errors'][] = [
                        'title' => 'При загрузке изображения произошла ошибка. Повторите попытку',
                    ];
                }

                if (empty($_SESSION['errors'])) {
                    // Проверяем установлен ли изображение у пользователя
                    $avatar = $user->avatar;
                    $avatarFolderLocation = ROOT . "usercontent/avatars/";
                    // Удаляем старый аватар если есть
                    if (!empty($avatar)) {
                        $pictureUrl  = $avatarFolderLocation . $avatar;
                        file_exists($pictureUrl) ? unlink($pictureUrl) : '' ;                        
                        $pictureUrl48 = $avatarFolderLocation . '48-' . $avatar;
                        file_exists($pictureUrl48) ? unlink($pictureUrl48) : '' ;                        
                    }

                    $db_file_name = rand(1000000000000,9999999999999) . "." . $fileExt;
                    $uploadfile160 = $avatarFolderLocation . $db_file_name;
                    $uploadfile48 = $avatarFolderLocation . '48-' . $db_file_name;
                    

                    // Обработка фотографии
                    $result160 = resize_and_crop($fileTmpLoc, $uploadfile160, 160, 160);
                    $result48 = resize_and_crop($fileTmpLoc, $uploadfile48, 48, 48);
                    
                    if ($result160 !== true || $result48 !== true) {
                        $_SESSION['errors'][] = ['title' => 'Ошибка сохранения файла.'];
                        return false;
                    }                                        
                    // Сохраняем в базу данных
                    $user->avatar = $db_file_name;
                    $user->avatarSmall = '48-' . $db_file_name;                    
                }
            }
            
            // Удаление изображения
            if (isset($_POST['delete-avatar']) && $_POST['delete-avatar'] == 'on') {
                // Удаление физического изображения
                $avatarFolderLocation = ROOT . "usercontent/avatars/";
                unlink($avatarFolderLocation . $user->avatar);
                unlink($avatarFolderLocation . '48-' . $user->avatar);
                // Удаление  изображения из БД
                $user->avatar = '';
                $user->avatarSmall = '';
            }
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
            
            if (isset($uriGet)) {
                // Редактирование чужого профиля
                $user = R::load('users', intval($uriGet));

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