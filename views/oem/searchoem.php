<div class="panel panel-default">
	<div class="panel-heading panel-heading-wrap">
		Результат поиска по ОЕМ номеру изделия
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table letter table-condensed">
				<thead>
					<tr>

						<th>ОЕМ номер</th>
						<th>Брєнд</th>
						<th>Название изделия</th>
						<th>Наличие</th>
						<th>Поставка</th>
						<th>Цена</th>
						<th>Корзина</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($data as $value){
						if($value['presence'] == 1){
							
						}
						echo'
							<tr>
							<td>'.$value['partcode'].'</td>
							<td>'.$value['partcode_supplier'].'</td>
							<td>'.$value['partcode_real_name'].'</td>
							<td>'.$value['presence'].'</td>
							<td>'.$value['delivery_time'].'</td>
							<td>'.$value['price'].'</td>
							<td><button class="btn btn-xs btn-default pay-button" data-artoem = "'.$value['partcode'].'"data-productid="" type="button" >&nbsp; <i class="fa fa-shopping-cart text-danger" aria-hidden="true"> </i>&nbsp; </button></td>
							</tr>
							
						';
					}
					?>
				</tbody>
			</table>
		</div>		
	</div>
</div>
