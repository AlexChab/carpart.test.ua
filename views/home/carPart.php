<?php
use app\models\Price;
?>
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
				foreach ($data as $value) {
					if ($value['ART_STATUS_TEXT'] == 'Нормальный') {
						$findPrice = Price::find()->where(['partcode'=>$value['ART_ARTICLE_NR']])->one();
						$price = $findPrice['price'];
						echo '
						<tr>
							<td>' . $value['ART_ARTICLE_NR'] . '</td>
							<td>' . $value['SUP_BRAND'] . '</td>
							<td>' . $value['ART_COMPLETE_DES_TEXT'] . '</td>
							<td class="buy-hover-td">'.$price.' </td>
							<td><button class="btn btn-xs btn-default pay-button" data-artid = "'.$value['LA_ART_ID'].'"data-productid="'.$value['ART_ARTICLE_NR'].'" type="button" >&nbsp; <i class="fa fa-shopping-cart text-danger" aria-hidden="true"> </i>&nbsp; </button></td>
						</tr>';
					}
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>