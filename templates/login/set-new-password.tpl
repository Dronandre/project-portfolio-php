<form class="authorization-form" method="POST" action="<?php echo HOST; ?>set-new-password">
    <div class="authorization-form__heading">
        <h2 class="heading">Установить новый пароль </h2>
    </div>

    <?php include ROOT . "templates/components/errors.tpl" ?>
    <?php include ROOT . "templates/components/success.tpl" ?>

    <div class="authorization-form__input">
        <input name="password" class="input" type="password" placeholder="Новый пароль" />
    </div>
    <div class="authorization-form__button">
        <button name="set-new-password" value="set-new-password" class="primary-button" type="submit">Установить пароль</button>
    </div>
    <div class="authorization-form__links">
        <a href="<?php echo HOST; ?>login">Вход на сайт</a>
        <a href="<?php echo HOST; ?>registration">Регистрация</a>
    </div>
</form>