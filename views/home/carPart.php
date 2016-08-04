<div class="panel panel-default">
	<div class="panel-heading panel-heading-wrap">
		Подбор по артикулу
	</div>
	<div class="panel-body">

		<div class="table-responsive">
			<table class="table table-condensed letter ">
				<thead>
				<tr>

					<th>Артикул</th>
					<th>Производитель</th>
					<th>Наименование</th>
					<th>Цена,грн</th>
					<th></th>

				</tr>
				</thead>
				<tbody>
				<?php
				foreach ($data as $value){
					if($value[0]['ART_STATUS_TEXT'] == 'Нормальный'){
						echo'
						<tr>
					
						<td>'.$value[0]['ART_ARTICLE_NR'].'</td>
						<td>'.$value[0]['SUP_BRAND'].'</td>
						<td>'.$value[0]['ART_COMPLETE_DES_TEXT'].'</td>
						<td class="buy-hover-td"> 165 </td>
						
						<td><button class="btn btn-xs btn-default pay-button" id="" type="button" >&nbsp; <i class="fa fa-shopping-cart text-danger" aria-hidden="true"> </i>&nbsp; </button></td>
						</tr>';
					}
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>