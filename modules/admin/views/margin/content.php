<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin(['options'=>['class'=>'col-sm-2']]);
echo $form->field($marginForm, 'bra_id')->hiddenInput(['value' =>$bra_id]);
echo $form->field($marginForm, 'bra_margin');
echo Html::submitButton('Сохранить', ['class' => 'btn btn-success']);
ActiveForm::end();
?>