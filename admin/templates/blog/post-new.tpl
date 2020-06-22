<div class="admin-page__content">
    <div class="admin-page__content-form">
        <div class="admin-form">
            <div class="admin-form__item">
                <h2 class="heading">Добавить пост </h2>
            </div>
            <div class="admin-form__item">
                <label class="input__label">Введите название записи <input class="input input--width-label" type="text" placeholder="Заголовок поста" />
                </label>
            </div>
            <div class="admin-form__item">
                <label class="select-label">Выберите категорию <select class="select">
                        <option value="notes1">Заметки путешественника</option>
                        <option value="notes2">Заметки программиста</option>
                        <option value="notes3">Заметки спортсмена</option>
                    </select>
                </label>
            </div>
            <div class="admin-form__item">
                <div class="radio">
                    <div class="radio__title">Статус публикации</div>
                    <label class="radio__item">
                        <input class="radio__btn" type="radio" name="status" value="draft" /><span class="radio__label">Черновик</span>
                    </label>
                    <label class="radio__item">
                        <input class="radio__btn" type="radio" name="status" value="published" /><span class="radio__label">Опубликовано</span>
                    </label>
                </div>
            </div>
            <div class="admin-form__item">
                <div class="checkboxes">
                    <div class="checkbox__title">Продвигать запись</div>
                    <label class="checkbox__item">
                        <input class="checkbox__btn" type="checkbox" name="onmain" /><span class="checkbox__label">Показывать на главной</span>
                    </label>
                    <label class="checkbox__item">
                        <input class="checkbox__btn" type="checkbox" name="popular" /><span class="checkbox__label">Популярные</span>
                    </label>
                    <label class="checkbox__item">
                        <input class="checkbox__btn" type="checkbox" name="recomended" /><span class="checkbox__label">Рекомендованные</span>
                    </label>
                </div>
            </div>
            <div class="admin-form__item">
                <label class="textarea__label">Содержимое поста <textarea class="textarea textarea--width-label" placeholder="Введите текст"></textarea>
                </label>
            </div>
            <div class="admin-form__item">
                <div class="block-upload">
                    <div class="block-upload__description">
                        <div class="block-upload__title">Обложка поста:</div>
                        <p>Изображение jpg или png, рекомендуемая ширина 945px и больше, высота от 400px и более. Вес до 2Мб.</p>
                        <div class="block-upload__file-wrapper">
                            <button class="file-button" type="file">Выбрать файл</button>
                            <div class="block-upload__file-name">some-picture.jpg</div>
                        </div>
                    </div>
                    <div class="block-upload__img"><img src="<?=HOST?>static/img/block-upload/block-upload.jpg" alt="Загрузка картинки" />
                        <div class="block-downloads__delete">
                            <button class="delete-button" type="reset">Удалить</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="admin-form__item buttons">
                <button class="primary-button" type="submit">Опубликовать</button><a class="secondary-button" href="#">Отмена</a>
            </div>
            <div class="admin-form__item"></div>
            <div class="admin-form__item"></div>
        </div>
    </div>
</div>