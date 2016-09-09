<h4> Валюта -  <?=$data['name']?> Текущий курс: <?=$data['rate']?> гривен </h4>
<p> Внимание ! Десятичный знак указывать через знак точки  - например 25.7</p>

<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
$form = ActiveForm::begin(['options'=>['class'=>'col-sm-2']]);
echo $form->field($currencyForm, 'rate');
echo Html::submitButton('Сохранить', ['class' => 'btn btn-success']);
ActiveForm::end();

?>