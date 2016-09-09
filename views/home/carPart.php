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
						if (DbBrands::findOne(['BRA_BRAND' => $value['SUP_BRAND']])!=null){
							$findPrice = Price::findOne(['partcode' => trim(preg_replace('~\s+~s','',$value['ART_ARTICLE_NR']))]);

							$findBrands = DbBrands::findOne(['BRA_BRAND' => $findPrice['partbrand']]);
							if($findPrice['price']!=null){
								$marginBrand = DbBrandsMargin::findBrands($findBrands['BRA_ID']);

								if ($findPrice['typcur'] == 'EUR'){
									$price = ($findPrice['price']*'1'.$marginBrand['margin']);
									$currencyExch = Currency::findOne(['code'=> 'EUR']);
									$price = ceil(($findPrice['price']*'1'.$marginBrand['margin'])*$currencyExch['rate']);
								}
								elseif ($findPrice['typcur'] == 'USD'){
									$currencyExch = Currency::findOne(['code'=> 'USD']);
									$price = ceil(($findPrice['price']*'1'.$marginBrand['margin'])*$currencyExch['rate']);
								}
								elseif ($findPrice['typcur'] == 'UAH'){
									$currencyExch = Currency::findOne(['code'=> 'UAH']);
									$price = ceil(($findPrice['price']*'1'.$marginBrand['margin'])*$currencyExch['rate']);
								}

								else{
									$price = ($findPrice['price']*'1'.$marginBrand['margin']);
								}

							}
							else{
								$price = 'уточн.';
							}

						echo '
						<tr>
							<td>' . $value['ART_ARTICLE_NR'] . '</td>
							<td>' . $findBrands['BRA_BRAND'] . '</td>
							<td>' . $value['SUP_BRAND'] . '</td>
							<td class="buy-hover-td">' . $price . ' </td>
							<td><button class="btn btn-xs btn-default pay-button" data-artid = "' . $value['LA_ART_ID'] . '"data-productid="' . $value['ART_ARTICLE_NR'] . '" type="button" >&nbsp; <i class="fa fa-shopping-cart text-danger" aria-hidden="true"> </i>&nbsp; </button></td>
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