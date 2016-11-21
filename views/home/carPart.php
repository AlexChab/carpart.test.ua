<?php
use app\models\Price;
use app\models\DbBrands;
use app\models\DbBrandsMargin;
use app\models\Currency;
?>
<div class="panel panel-default">
	<div class="panel-heading panel-heading-wrap">
		Подбор по артикулу
	</div>
	<div class="panel-body">
<!--		$value['SUP_BRAND']-->
<!--		$value['ART_COMPLETE_DES_TEXT']-->
<!--		$findBrands['BRA_BRAND']-->
		<div class="table-responsive">
			<table class="table table-condensed letter ">
				<thead>
				<tr>

					<th>Артикул</th>
					<th>Производитель</th>
					<th>Наименование</th>
					<th>Цена,грн</th>
					<th>Купить</th>

				</tr>
				</thead>
				<tbody>
				<?php
				foreach ($data as $value) {
					if ($value['ART_STATUS_TEXT'] == 'Нормальный') {
						if (DbBrands::findOne(['BRA_BRAND' => $value['SUP_BRAND']])!=null){
							//$findPrice = Price::findOne(['partcode' => trim(preg_replace('~\s+~s','',$value['ART_ARTICLE_NR'])),'partbrand' => trim($value['SUP_BRAND'])]);
							$findPrice = Price::findOne(['partcode' => trim(preg_replace('/[^a-zA-Z0-9]/','',$value['ART_ARTICLE_NR'])),'partbrand' => trim($value['SUP_BRAND'])]);
							$findBrands = DbBrands::findOne(['BRA_BRAND' => $findPrice['partbrand']]);
							if($findPrice['price']!=null){
								$marginBrand = DbBrandsMargin::findBrands($findBrands['BRA_ID']);
								$currencyExch = Currency::findOne(['code'=> $findPrice['typcur']]);
								$price = ceil($findPrice['price']*(($marginBrand['margin']+100)/100)*$currencyExch['rate']);
							}
							else{
								$price = 'уточн.';
							}
						echo '
						<tr>
							<td>' . $value['ART_ARTICLE_NR'] . '</td>
							<td>' . $value['SUP_BRAND'] . '</td>
							<td>' . $value['ART_COMPLETE_DES_TEXT'] . '</td>
							
							<td class="buy-hover-td">' . $price . ' </td>
							<td><button class="btn btn-xs btn-default pay-button" data-partname = "'.$value['ART_COMPLETE_DES_TEXT'].'" data-source = "'.$value['source'].'" data-artid="' . $value['ART_ARTICLE_NR'] . '" data-brand = "'.$value['SUP_BRAND'].'" data-price = "'.$price.'"  type="button" >&nbsp; <i class="fa fa-shopping-cart text-danger" aria-hidden="true"> </i>&nbsp; </button></td>
						</tr>';

						}
					}
				}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>