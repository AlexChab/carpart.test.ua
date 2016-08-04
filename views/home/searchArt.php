<div class="panel panel-default">
	<div class="panel-heading panel-heading-wrap">
		Результат поиска по артикулу
	</div>
	<div class="panel-body">
			<div class="table-responsive">
			<table class="table letter table-condensed">
				<thead>
				<tr>
					
					<th>Производитель</th>
					<th>Номер изделия</th>
					<th>Тип номера</th>
					<th>Артикульный номер</th>
					<th>Название изделия</th>

				</tr>
				</thead>
				<tbody>

				<?php
				foreach ($data as $value){
					
						echo'
						<tr>
						
						<td>'.$value['BRAND'].'</td>
						<td>'.$value['NUMBER'].'</td>
						<td>'.$value['ARL_KIND'].'</td>
						<td>'.$value['ARL_ART_ID'].'</td>
						<td>'.$value['ART_COMPLETE_DES_TEXT'].'</td>
						</tr>';

				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>