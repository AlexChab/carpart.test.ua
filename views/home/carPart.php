<div class="panel panel-default">
	<div class="panel-heading panel-heading-wrap">
		Подбор по артикулу
	</div>
	<div class="panel-body">

		<div class="table-responsive">
			<table class="table letter table-condensed">
				<thead>
				<tr>
					<th>Tree</th>
					<th>Артикул</th>
					<th>Производитель</th>
					<th>Наименование</th>
					<th>Стааус</th>
					<th>В корзину</th>

				</tr>
				</thead>
				<tbody>
				<?php
				foreach ($data as $value){
					if($value[0]['ART_STATUS_TEXT'] == 'Нормальный'){
						echo'
						<tr>
						<td><a href="#"</a></td>
						<td>'.$value[0]['ART_ARTICLE_NR'].'</td>
						<td>'.$value[0]['SUP_BRAND'].'</td>
						<td>'.$value[0]['ART_COMPLETE_DES_TEXT'].'</td>
						<td>'.$value[0]['ART_STATUS_TEXT'].'</td>
						<td><input type="button" class="btn btn-primary btn-sm" value="buy"></td>
						</tr>';
					}
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>