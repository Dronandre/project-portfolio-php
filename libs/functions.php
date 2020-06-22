<?php

// Поиск названия модуля для админки
function getModuleNameForAdmin (){
    // Обработка запроса
    $uri = $_SERVER['REQUEST_URI'];


    $uriArr = explode('?', $uri);
    $uri = $uriArr[0];
    $uri = rtrim($uri, "/");
    $uri = substr($uri, 1);
    $uri = filter_var($uri, FILTER_SANITIZE_URL);
    $moduleNameArr = explode('/', $uri);
    $uriModule = $moduleNameArr[1];

    return $uriModule;
}

// Поиск названия модуля
function getModuleName(){
    // Обработка запроса
    $uri = $_SERVER['REQUEST_URI'];


    $uriArr = explode('?', $uri);
    $uri = $uriArr[0];
    $uri = rtrim($uri, "/");
    $uri = substr($uri, 1);
    $uri = filter_var($uri, FILTER_SANITIZE_URL);
    $moduleNameArr = explode('/', $uri);
    $uriModule = $moduleNameArr[0];

    return $uriModule;
}

// Аналог get запроса из URI
function getUriGet(){
    // Обработка запроса
    $uri = $_SERVER['REQUEST_URI'];
    $uri = rtrim($uri, '/');
    $uri = filter_var($uri, FILTER_SANITIZE_URL);
    $uri = substr($uri, 1);
    $uri = explode('?', $uri);
    $uri = $uri[0];
    $uriArr = explode('/', $uri);
    $uriGet = isset($uriArr[1]) ? $uriArr[1] : null;
    return $uriGet;
}

?>