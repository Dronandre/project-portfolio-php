<?php

$pageTitle = "Профиль пользователя";
$pageClass = "profile-page";

if (isset($uriGet)) {
    $user = R::load('users', $uriGet);
} else {
    if (isset($_SESSION['login']) && $_SESSION['login'] === 1) {
        
        $user = R::load('users', $_SESSION['logged_user']['id']);
    } else {
        $userNotLoggedIn = true;
    }
}

include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/profile/profile.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";