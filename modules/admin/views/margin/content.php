<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;

echo $bra_id;
$form = ActiveForm::begin(['options'=>['class'=>'col-sm-2']]);
echo $form->field($marginForm, 'bra_id',[
'inputOptions' => [
	'value' => 'trtr',
],]);
echo $form->field($marginForm, 'bra_name')->hiddenInput(['value' =>$bra_id])->label(false);
echo $form->field($marginForm, 'bra_margin')->label('Торговая наценка');

echo Html::button('Сохранить', ['class' => 'btn btn-success']);
ActiveForm::end();
//print_r($marginForm);
?>