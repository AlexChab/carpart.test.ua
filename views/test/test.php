<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin(['options'=>['class'=>'col-sm-2']]);
echo $form->field($testform, 'test');
echo Html::submitButton('Сохранить', ['class' => 'btn btn-success']);
ActiveForm::end();

?>