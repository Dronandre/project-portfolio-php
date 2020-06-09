<!-- Проверяем залогинен пользователь  или админ -->
<?php if (isset($_SESSION['login']) && $_SESSION['login'] === 1) : ?>
    <!-- Проверка на user or admin -->
    <?php if ($_SESSION['logged_user']['role'] === 'admin') : ?>
        <a class="secondary-button" href="<?= HOST ?>profile-edit/<?= $user->id ?>">Редактировать</a>
    <?php elseif ($_SESSION['logged_user']['role'] === 'user') : ?>
        <?php if ($_SESSION['logged_user']['id'] === $user->id) : ?>
            <a class="secondary-button" href="<?= HOST ?>profile-edit">Редактировать</a>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>