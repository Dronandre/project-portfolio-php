<?php

$pageTitle = "Блог все записи";

if (isset($uriGet)) {
    $post = R::load('posts', $uriGet);

    ob_start();
    include ROOT . "templates/blog/single-post.tpl";
    $content = ob_get_contents();
    ob_end_clean();
    
} else {

    function pagination($results_per_page, $type){

        $number_of_results = R::count($type);
        $number_of_pages = ceil($number_of_results / $results_per_page);


        if ( !isset($_GET['page'])) {
            $page_number = 1;
        } else {
            $page_number =$_GET['page'];
        }
    }

    $posts = R::find('posts', 'ORDER BY id DESC LIMIT 0, 6');

    ob_start();
    include ROOT . "templates/blog/all-posts.tpl";
    $content = ob_get_contents();
    ob_end_clean();
}



include ROOT . "templates/_page-parts/_head.tpl";
include ROOT . "templates/_parts/_header.tpl";
include ROOT . "templates/blog/index.tpl";
include ROOT . "templates/_parts/_footer.tpl";
include ROOT . "templates/_page-parts/_foot.tpl";