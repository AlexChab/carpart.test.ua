<?php

namespace app\controllers;

use Yii;

// use Yii\swiftmailer\Mailer;


class CartController extends AppController
{
	public function actionAddorder()
	{
		$request = Yii::$app->request;
		$idProduct = $request->get('id');
		$this->debug($idProduct);
	}
	public function actionDelorder()
	{
		$request = Yii::$app->request;
		$idProduct = $request->get('id');
		$this->debug($idProduct);
	}
	public function actionSuccessbuy(){
		$request = Yii::$app->request;
		$data = json_decode($request->post('jsonData'), true);
		$nameBuyer = $request->post('formNameBuyer');
		$emailBuyer = $request->post('formEmailBuyer');
		$phoneBuyer = $request->post('formPhoneBuyer');

		$contentBuyers = ' <h4> Заказ № от '.date("d-m-Y H:i:s").'</h4>Имя покупателя: '.$nameBuyer.' <br>Email покупателя: '.$emailBuyer.' <br>Телефон покупателя: '.$phoneBuyer.' <br> <hr> ';
		$contentHeader = '
		<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" >
    <tr>
        <td valign="top">
            <table border="0" cellpadding="0" cellspacing="0" width="600">
            		<tr>
            			<th>Источник</th>
            			<th>Код</th>
            			<th>Название</th>
            			<th>Брэнд</th>
            			<th>Цена</th>
            			<th>Количество</th>
            		</tr>
                
            ';
		$contentBody = '';
		$contentFooter = '</table></td></tr></table>
 		<p>
 		Магазин - склад № 200 <br>
		65100 г.Одесса , авторынок "Успех" <br>
		пр-т. маршала Жукова 2А <br>
		тел: +38(048)706-93-40 +38(067)502-20-32 <br>
		</p>';
		foreach ($data as $value){
			$contentBody .= '<tr><td align="center" valign="top">'.$value[0].'</td><td align="center" valign="top">'.$value[1].'</td><td align="center" valign="top">'.$value[2].'</td><td align="center" valign="top">'.$value[3].'</td><td align="center" valign="top">'.$value[4].'</td><td align="center" valign="top">'.$value[5].'</td></tr>';
		}
		$htmlBody = $contentBuyers.$contentHeader.$contentBody.$contentFooter;
		$this->debug($htmlBody);
		Yii::$app->mailer->compose()
			->setFrom('partcar.od@gmail.com')
			->setTo('alexchab.1808@gmail.com')
			->setSubject('Заказ')
			->setTextBody('Заказ с сайта')
			->setHtmlBody($htmlBody)
			->send();

	}

	public function actionCreateorder(){
		$request = Yii::$app->request;
		$data = json_decode($request->post('jsonData'), true);
		$contentForm ='
		<form role="form" id="formBuyer">
  		<div class="form-group col-lg-6">
    		<label for="nameBuyer">Имя, Фамилия</label>
    		<input type="text" class="form-control" id="inputNameBuyer" placeholder="Bмя,фамилия">
  		</div>
  		<div class="form-group col-lg-6">
    		<label for="">Email</label>
    		<input type="email" class="form-control" id="inputEmailBuyer" placeholder="Email">
  		</div>
  		<div class="form-group col-lg-6">
    		<label for="">Телефон</label>
    		<input type="text" class="form-control " id="inputPhoneBuyer" placeholder="(067)7542132">
  		</div>
  	</form>';
		$contentHeader = '
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Код</th>
					<th>Название</th>
					<th>Брэнд</th>
					<th>Кол-во</th>
					<th>Цена,шт.</th>
				</tr>
			</thead>
			<tbody>';
		$contentBody = '';
		$contentFooter = '</tbody></table>';
		foreach ($data as $value){
			$contentBody .= '<tr><td >'.$value[1].'</td><td>'.$value[2].'</td><td>'.$value[3].'</td><td >'.$value[5].'</td><td >'.$value[4].'</td></tr>';
		}
		$htmlBody = $contentForm.$contentHeader.$contentBody.$contentFooter;
		return $htmlBody;
	}
}