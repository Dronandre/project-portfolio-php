<div class="section-pagination">
    <!-- Кнопка назад -->
    <?php include ROOT . "templates/_parts/pagination/_button-prev.tpl"; ?>

    <?php
    if ($pagination['number_of_pages'] > 6) {
        // Если больше 6 страниц
        include ROOT . "templates/_parts/pagination/_pages-then-more-6.tpl";
    } else {
        // Если 6 и меньше 
        include ROOT . "templates/_parts/pagination/_page-loop.tpl";
    }
    ?>
    <!-- Кнопка вперед-->
    <?php include ROOT . "templates/_parts/pagination/_button-next.tpl"; ?>
    
</div>