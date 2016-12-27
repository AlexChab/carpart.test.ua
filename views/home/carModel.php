<div class="panel panel-default">
	<div class="panel-heading panel-heading-wrap">
		Модели автомобиля
	</div>
	<div class="panel-body">

		<div class="table-responsive">
			<table class="table letter table-condensed">
				<thead>
				<tr>

					<th>Модификация</th>
					<th>Топливо</th>
					<th>Двигатель</th>
					<th>Мощность</th>
					<th>Обьем</th>
					<th>Начало выпуска</th>
				</tr>
				</thead>
				<tbody>
				<?php
				foreach ($data as $value){
					echo'
					<tr data-href="/home/gettree?typ_id='.$value['TYP_ID'].'&str_id=10001">
					<td>'.$value['TYP_CDS_TEXT'].'</td>
					<td>'.$value['TYP_FUEL_DES_TEXT'].'</td>
					<td>'.$value['ENG_CODE'].'</td>
					<td>'.$value['TYP_HP_FROM'].'</td>
					<td>'.$value['TYP_CCM'].'</td>
					<td>'.$value['TYP_PCON_START'].'</td>
					</tr>';
				}

				?>

			</tbody>
			</table>
		</div>
	</div>
</div>

