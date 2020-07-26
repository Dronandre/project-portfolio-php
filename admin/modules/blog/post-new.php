<?php

if (isset($_POST['postSubmit'])) {
    // Проверка на заполненность
    if (trim($_POST['title'] == '')) {
        $_SESSION['errors'][] = ['title' => 'Введите название поста'];
    } 
    if (trim($_POST['content'] == '')) {
        $_SESSION['errors'][] = ['title' => 'Заполните содержимое поста'];
    } 

    if (empty($_SESSION['errors'])) {
        $post = R::dispense('posts');
        $post->title = $_POST['title'];
        $post->content = $_POST['content'];
        $post->timestamp = time();


         // Работа с изображением аватара

        if (isset($_FILES['cover']['name']) && $_FILES['cover']['name'] !== '') {
            // Записываем паарметры файла в переменную
            $fileName = $_FILES['cover']['name'];
            $fileTmpLoc = $_FILES['cover']['tmp_name'];
            $fileType = $_FILES['cover']['type'];
            $fileSize = $_FILES['cover']['size'];
            $fileErrorMsg = $_FILES['cover']['error'];
            $kaboom = explode('.' , $fileName);
            $fileExt = end($kaboom);

            // Проверка файла на корректность
            list($width, $height) = getimagesize($fileTmpLoc);
            if ($width < 600 || $height < 300) {
                $_SESSION['errors'][] = [
                    'title' => 'Изображение слишком малого размера.',
                    'desc' => '<p>Загрузите изображение c размерами от 600x300 или более.</p>'
                ];
            }

            if ($fileSize > 12582912) {
                $_SESSION['errors'][] = [
                    'title' => 'Файл изображения не должен быть более 12 mb.'                    
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
                
                $coverFolderLocation = ROOT . "usercontent/blog/";
                
                $db_file_name = rand(1000000000000,9999999999999) . "." . $fileExt;
                $uploadfile1110= $coverFolderLocation . $db_file_name;
                $uploadfile290 = $coverFolderLocation . '290-' . $db_file_name;
                

                // Обработка фотографии
                $result1110 = resize_and_crop($fileTmpLoc, $uploadfile1110, 1110, 460);
                $result290 = resize_and_crop($fileTmpLoc, $uploadfile290, 290, 230);
                
                if ($result1110 !== true || $result290 !== true) {
                    $_SESSION['errors'][] = ['title' => 'Ошибка сохранения файла.'];
                    return false;
                }                                        
                // Сохраняем в базу данных
                $post->cover = $db_file_name;
                $post->coverSmall = '290-' . $db_file_name;                    
            }
        }

        R::store($post);
        $_SESSION['success'][] = ['title' => 'Пост успешно добавлен'];
        header('Location: ' . HOST . 'admin/blog');
        exit();
    }
    
}

ob_start();
include ROOT . "admin/templates/blog/post-new.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . 'admin/templates/template.tpl';
