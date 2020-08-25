<div class="section-pagination">
    <?php if(isset($_GET['page'] ) && $_GET['page'] != 1):?>
    <div class="section-pagination__item"><a class="pagination-button" href="?page=<?php echo intval($_GET['page']) - 1 ;?>">назад</a>
    </div>
    <?php endif;?>

    <?php for ($page = 1; $page <= $number_of_pages ; $page++) :?>
    <div class="section-pagination__item"> 
        <?php 
        $active_class = '';
        if (isset($_GET['page'] ) && $_GET['page'] == $page) {
            $active_class = 'active';
        } else if(!isset($_GET['page']) && $page === 1) {
            $active_class = 'active';
        }         
        ?>
        <a 
            class="pagination-button  <?= $active_class?>" 
            href="?page=<?= $page ?>"
        ><?= $page ?></a>
    </div>
    <?php endfor;?>
    
    <?php if(isset($_GET['page'] ) && $_GET['page'] != $number_of_pages):?>
    <div class="section-pagination__item"><a class="pagination-button" href="?page=<?php echo intval($_GET['page']) + 1 ;?>">вперед</a>
    </div>
    <?php endif;?>
</div>