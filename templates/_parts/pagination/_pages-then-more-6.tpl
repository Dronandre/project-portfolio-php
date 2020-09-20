        <!-- Показываем многоточие в начале -->
        <?php if ($pagination['page_number'] - 3 === 1) : ?>
            <div class="section-pagination__item">
                <a class="pagination-button" href="?page=1">1</a>
            </div>
        <?php elseif ($pagination['page_number'] - 3 > 1) : ?>
            <div class="section-pagination__item">
                <a class="pagination-button" href="?page=1">1</a>
            </div>
            <div class="section-pagination__item">
                <a class="pagination-button" href="?page=<?echo ($pagination['page_number'] - 3);?>">...</a>
            </div>
        <?php endif; ?>

        <!-- Показываем предыдущие страницы -->
        <?php if ($pagination['page_number'] - 2 > 0) : ?>
            <div class="section-pagination__item">
                <a class="pagination-button" href="?page=<?echo ($pagination['page_number'] - 2);?>">
                    <?echo ($pagination['page_number'] - 2);?></a>
            </div>
        <?php endif; ?>

        <?php if ($pagination['page_number'] - 1 > 0) : ?>
            <div class="section-pagination__item">
                <a class="pagination-button" href="?page=<?echo ($pagination['page_number'] - 1);?>">
                    <?echo ($pagination['page_number'] - 1);?></a>
            </div>
        <?php endif; ?>

        <!-- Показываем текущую страницу -->
        <div class="section-pagination__item">
            <a class="pagination-button active" href="?page=<?= $pagination['page_number'] ?>"><?= $pagination['page_number'] ?></a>
        </div>

        <!-- Показываем следующие страницы -->
        <?php if ($pagination['page_number'] + 1 <= $pagination['number_of_pages']) : ?>
            <div class="section-pagination__item">
                <a class="pagination-button" href="?page=<?echo ($pagination['page_number'] + 1);?>">
                    <?echo ($pagination['page_number'] + 1);?></a>
            </div>
        <?php endif; ?>

        <?php if ($pagination['page_number'] + 2 <= $pagination['number_of_pages']) : ?>
            <div class="section-pagination__item">
                <a class="pagination-button" href="?page=<?echo ($pagination['page_number'] + 2);?>">
                    <?echo ($pagination['page_number'] + 2);?></a>
            </div>
        <?php endif; ?>

        <!-- Показываем многоточие в конце -->
        <?php if ($pagination['page_number'] + 3 === $pagination['number_of_pages']) : ?>
            <div class="section-pagination__item">
                <a class="pagination-button" href="?page=1">
                    <?echo $pagination['number_of_pages']?>
                    <?echo $pagination['number_of_pages'];?></a>
            </div>

        <?php elseif ($pagination['page_number'] + 3 <= $pagination['number_of_pages']) : ?>
            <div class="section-pagination__item">
                <a class="pagination-button" href="?page=<?echo ($pagination['page_number'] + 3);?>">...</a>
            </div>
            <div class="section-pagination__item">
                <a class="pagination-button" href="?page=<?echo $pagination['number_of_pages'];?>">
                    <?echo $pagination['number_of_pages']?></a>
            </div>
        <?php endif; ?>