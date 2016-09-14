<?php
use app\models\Price;
use app\models\DbBrands;
use app\models\DbBrandsMargin;
use app\models\Currency;
?>

<div class="panel panel-default">
	<div class="panel-heading panel-heading-wrap">
		Результат поиска по артикулу
	</div>
	<div class="panel-body">
			<div class="table-responsive">
			<table class="table letter table-condensed">
				<thead>
				<tr>
					<th>Артикул</th>
					<th>Производитель</th>
					<th>Тип </th>
					<th>Название изделия</th>
					<th>Цена</th>
					<th>Купить</th>
					


				</tr>
				</thead>
				<tbody>

			<?php
				foreach ($data as $value) {
					$price = 'уточн.';
					// Проверяем на наличие в допустимых брендах
					$findBrands = DbBrands::findOne(['BRA_BRAND' => $value['BRAND']]);
					if ($findBrands!=null){
						$findPrice = Price::findOne(['partcode' => trim($value['NUMBER']),'partbrand' => trim($value['BRAND'])]);
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
						<td>' . $value['NUMBER'] . '</td>
						<td>' . $value['BRAND'] . '</td>
						<td>' . $value['ARL_KIND'] . '</td>
						<td>' . $value['ART_COMPLETE_DES_TEXT'] . '</td>
						<td>'.$price.'</td>
						<td><button class="btn btn-xs btn-default pay-button" data-partname = "'.$value['ART_COMPLETE_DES_TEXT'].'" data-source = "'.$source.'" data-artid="' . $value['NUMBER'] . '" data-brand = "'.$value['BRAND'].'" data-price = "'.$price.'"  type="button" >&nbsp; <i class="fa fa-shopping-cart text-danger" aria-hidden="true"> </i>&nbsp; </button></td>
						</tr>';

					}




//				if (DbBrands::findOne(['BRA_BRAND' => $value['SUP_BRAND']])!=null) {
//					$findPrice = Price::findOne(['partcode' => trim(preg_replace('~\s+~s', '', $value['ART_ARTICLE_NR']))]);
//
//					$findBrands = DbBrands::findOne(['BRA_BRAND' => $findPrice['partbrand']]);
//					if ($findPrice['price'] != null) {
//						$marginBrand = DbBrandsMargin::findBrands($findBrands['BRA_ID']);
//
//						if ($findPrice['typcur'] == 'EUR') {
//							$price = ($findPrice['price'] * '1' . $marginBrand['margin']);
//							$currencyExch = Currency::findOne(['code' => 'EUR']);
//							$price = ceil(($findPrice['price'] * '1' . $marginBrand['margin']) * $currencyExch['rate']);
//						} elseif ($findPrice['typcur'] == 'USD') {
//							$currencyExch = Currency::findOne(['code' => 'USD']);
//							$price = ceil(($findPrice['price'] * '1' . $marginBrand['margin']) * $currencyExch['rate']);
//						} elseif ($findPrice['typcur'] == 'UAH') {
//							$currencyExch = Currency::findOne(['code' => 'UAH']);
//							$price = ceil(($findPrice['price'] * '1' . $marginBrand['margin']) * $currencyExch['rate']);
//						} else {
//							$price = ($findPrice['price'] * '1' . $marginBrand['margin']);
//						}
//
//					
//				}


				}

				?>
				</tbody>
			</table>
		</div>
	</div>
</div>