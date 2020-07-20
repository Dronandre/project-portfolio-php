<div class="admin-page__content">
		<div class="admin-page__content-form">
            <div class="admin-form" style="width: 900px;">

                <?php include ROOT . 'admin/templates/components/errors.tpl'; ?>
                <?php include ROOT . 'admin/templates/components/success.tpl'; ?>

				<div class="admin-form__item d-flex justify-content-between mb-20">
					<h2 class="heading">Блог - все записи </h2><a class="secondary-button" href="<?=HOST?>admin/post-new">Добавить запись</a>
				</div>
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Название</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td><a href="#">Заметки путешественника</a></td>
							<td>
								<button class="icon-delete"></button>
							</td>
						</tr>
						<tr>
							<td>2</td>
							<td><a href="#">Заметки программиста</a></td>
							<td>
								<button class="icon-delete"></button>
							</td>
						</tr>
						<tr>
							<td>3</td>
							<td><a href="#">Заметки спортсмена</a></td>
							<td>
								<button class="icon-delete"></button>
							</td>
						</tr>
						<tr>
							<td>4</td>
							<td><a href="#">Заметки фотографа</a></td>
							<td>
								<button class="icon-delete"></button>
							</td>
						</tr>
					</tbody>
				</table>
				<div class="admin-form__item pt-40">
					<div class="section-pagination">
						<div class="section-pagination__item"><a class="pagination-button" href="#">назад</a>
						</div>
						<div class="section-pagination__item"> <a class="pagination-button active" href="#">1</a>
						</div>
						<div class="section-pagination__item"><a class="pagination-button" href="#">2</a>
						</div>
						<div class="section-pagination__item"><a class="pagination-button" href="#">3</a>
						</div>
						<div class="section-pagination__item"><a class="pagination-button" href="#">вперед</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>