<?php

namespace app\controllers;
use SoapClient;
use app\models\Currency;


class OemController extends AppController
{
	public function actionGetoem($oem)
	{
		if ($oem != null) {
			$oem = trim($oem);
//			$client = new SoapClient("http://www.test.aurora-parts.com.ua/api/api.wsdl");
//			$answer = $client->login("Pit-stop_2001@mail.ru", "7069340", "12345");
			$client = new SoapClient("http://www.aurora-parts.com.ua/api/api.wsdl");
			$answer = $client->login("Pit-stop_2001@mail.ru", "7069340", "nflOiS|#urv9o");
			$session = (json_decode($answer, TRUE));
			$answer = $client->findCode($session['session_id'], $oem);
			$data = json_decode($answer, TRUE);
			if ($data['success'] == 1) {
				echo '
			<div class="panel panel-default">
				<div class="panel-heading panel-heading-wrap">
					Результат поиска по ОЕМ номеру изделия (оригинальные изделия)
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table letter table-condensed">
							<thead>
								<tr>
									<th>ОЕМ номер</th>
									<th>Бренд</th>
									<th>Название изделия</th>
									<th>Описание изделия</th>
									<th>Наличие</th>
									<th>Поставка</th>
									<th>Цена, грн.</th>
									<th>Корзина</th>
								</tr>
							</thead>
							<tbody>';


				$currency = Currency::findOne([
					'code' => 'EUR',
				]);;

				foreach ($data['data'] as $value) {
					if ($value['price'] != null) {
						$price = ceil($value['price'] * 1.20 * $currency['rate']);
					} else {
						$price = 'уточ.';
					}

					if ($value['presence'] == 1) {
						$presence = '<i class="fa fa-check text-success" aria-hidden="true"></i>';
					} else {
						$presence = '<i class="fa fa-times text-danger" aria-hidden="true"></i>';
					}
					echo '
				<tr>
					<td>' . $value['partcode'] . '</td>
					<td>' . $value['partcode_supplier'] . '</td>
					<td>' . $value['partcode_real_name'] . '</td>
					<td>' . $value['partcode_extrainfo'] . '</td>
					<td>' . $presence . '</td>
					<td>' . $value['delivery_time'] . '</td>
					<td>' . $price . '</td>
					<td><button class="btn btn-xs btn-default pay-button" data-artoem = "' . $value['partcode'] . '"data-productid="" type="button" >&nbsp; <i class="fa fa-shopping-cart text-danger" aria-hidden="true"> </i>&nbsp; </button></td>
				</tr>';
				}
				echo '	
						</tbody>
					</table>
				</div>		
			</div>
		</div>';
			} else {
				echo '
			<div class="panel panel-default">
				<div class="panel-heading panel-heading-wrap">
					Результат поиска по ОЕМ номеру изделия
				</div>
					<div class="panel-body">
						<h4>По вашему запросу ничего не найдено</h4>
						<p> Уточните ОЕМ номер изделия или обратитесь по телефонам службы заказа </p>
					</div>
			</div>		
			';
			}

		}
		else{
			echo '
			<div class="panel panel-default">
				<div class="panel-heading panel-heading-wrap">
					Результат поиска по ОЕМ номеру изделия
				</div>
					<div class="panel-body">
						<h4>По вашему пустому запросу ничего не найдено</h4>
						<p> Уточните ОЕМ номер изделия или обратитесь по телефонам службы заказа </p>
					</div>
			</div>		
			';
		}
	}
}