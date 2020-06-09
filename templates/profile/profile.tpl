<main class="page-profile">

    <?php if (isset($userNotLoggedIn)) : ?>
        <div class="section">
            <div class="container">
                <div class="section__title">
                    <h2 class="heading mb-35">Профиль пользователя</h2>
                    <p>Чтобы посмотреть свой профиль <a href="<?= HOST ?>login">войдите</a> либо <a href="<?= HOST ?>registration">зарегистрируйтесь</a>.</p>
                </div>
            </div>
        </div>

    <?php elseif ($user['id'] === 0) : ?>
        <div class="section">
            <div class="container">
                <div class="section__title">
                    <h2 class="heading mb-35">Такого пользователя не существует</h2>
                    <p><a href="<?= HOST ?>">Вернуться на главную</a>.</p>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="section">
            <div class="container">
                <div class="section__title">
                    <h2 class="heading">Профиль пользователя </h2>
                </div>
                <div class="section__body">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <?php include ROOT . "templates/components/errors.tpl" ?>
                            <?php include ROOT . "templates/components/success.tpl" ?>
                        </div>
                    </div>
                    <?php if (empty($user->name)) : ?>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="enter-or-reg flex-column flex-column-elements-margin">
                                    <div class="enter-or-reg__text">
                                        😔Профиль еще не заполнен.
                                    </div>
                                    <?php include ROOT . "templates/profile/_parts/button-edit-profile.tpl" ?>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="row justify-content-center">
                            <div class="col-md-2">
                                <div class="avatar-big">
                                    <?php if(!empty($user->avatar)) :?>
                                    <img src="<?php echo HOST ?>usercontent/avatars/<?=$user->avatar?> " alt="Аватарка" />
                                    <?php else:?>
                                    <img src="<?php echo HOST ?>usercontent/avatars/no_avatar.png " alt="Аватарка" />
                                    <?php endif;?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="definition-list mb-20">
                                    <?php if (!empty($user->name)) : ?>
                                        <dl class="definition">
                                            <dt class="definition__term">имя и фамилия</dt>
                                            <dd class="definition__description"> <?php echo $user->name ?> <?php echo $user->surname ?></dd>
                                        </dl>
                                    <?php endif; ?>
                                    <?php if (!empty($user->country) || !empty($user->city)) : ?>
                                        <dl class="definition">
                                            <dt class="definition__term">
                                                <?php if (!empty($user->country)) : ?>
                                                    Страна
                                                <?php endif; ?>
                                                <?php if (!empty($user->country) && !empty($user->city)) : ?>
                                                    ,
                                                <?php endif; ?>
                                                <?php if (!empty($user->city)) : ?>
                                                    Город
                                                <?php endif; ?>
                                            </dt>
                                            <dd class="definition__description">
                                                <?php echo $user->country ?>
                                                <?php if (!empty($user->country) && !empty($user->city)) : ?>
                                                    ,
                                                <?php endif; ?>
                                                <?php echo $user->city ?></dd>
                                        </dl>
                                    <?php endif; ?>
                                </div>                                
                                <?php include ROOT . "templates/profile/_parts/button-edit-profile.tpl" ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="section bg-grey">
            <div class="container">
                <div class="section__title">
                    <h2 class="heading">Комментарии пользователя </h2>
                </div>
                <div class="section__body">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="comment">
                                <div class="comment__avatar"><a href="#">
                                        <div class="avatar-small"><img src="<?php echo HOST; ?>static/img/avatars/avatart-rect.jpg" alt="Аватарка" /></div>
                                    </a>
                                </div>
                                <div class="comment__data">
                                    <div class="comment__user-info">
                                        <div class="comment__username">Джон До</div>
                                        <div class="comment__date"><img src="<?php echo HOST; ?>static/img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
                                    </div>
                                    <div class="comment__text">
                                        <p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="comment">
                                <div class="comment__avatar"><a href="#">
                                        <div class="avatar-small"><img src="<?php echo HOST; ?>static/img/avatars/avatart-rect.jpg" alt="Аватарка" /></div>
                                    </a>
                                </div>
                                <div class="comment__data">
                                    <div class="comment__user-info">
                                        <div class="comment__username">Джон До</div>
                                        <div class="comment__date"><img src="<?php echo HOST; ?>static/img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
                                    </div>
                                    <div class="comment__text">
                                        <p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="comment">
                                <div class="comment__avatar"><a href="#">
                                        <div class="avatar-small"><img src="<?php echo HOST; ?>static/img/avatars/avatart-rect.jpg" alt="Аватарка" /></div>
                                    </a>
                                </div>
                                <div class="comment__data">
                                    <div class="comment__user-info">
                                        <div class="comment__username">Джон До</div>
                                        <div class="comment__date"><img src="<?php echo HOST; ?>static/img/favicons/clock.svg" alt="Дата публикации" />05 мая 2017 года 15:45</div>
                                    </div>
                                    <div class="comment__text">
                                        <p>Замечательный парк, обязательно отправлюсь туда этим летом.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</main>