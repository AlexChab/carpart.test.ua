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
	public function actionCreateorder(){
		$request = Yii::$app->request;
		$data = json_decode($request->post('jsonData'), true);

		$contentHeader = '<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" >
    <tr>
        <td align="center" valign="top">
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
		$contentFooter = '</table></td></tr></table>';

		foreach ($data as $value){
			$this->debug($value) ;
			$contentBody .= '<tr><td align="center" valign="top">'.$value[0].'</td><td align="center" valign="top">'.$value[1].'</td><td align="center" valign="top">'.$value[2].'</td><td align="center" valign="top">'.$value[3].'</td><td align="center" valign="top">'.$value[4].'</td><td align="center" valign="top">'.$value[5].'</td></tr>';
			echo $value[1];
			
		}
		$htmlBody = $contentHeader.$contentBody.$contentFooter;
				Yii::$app->mailer->compose()
			->setFrom('sonata@e911.com.ua')
			->setTo('alexchab.1808@gmail.com')
			->setSubject('Заказ')
			->setTextBody('Заказ с сайта')
			->setHtmlBody($htmlBody)
			->send();
	}
}