<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
	<h3>Редактирование поставщика</h3>


<?php

$form = ActiveForm::begin(['options'=>['class'=>'col-sm-4']]);
//echo $form->field($suppliersForm, 'id')->textInput(['value' =>$data['id']]);
echo $form->field($suppliersForm, 'name')->textInput(['value'=>$data['name']]);
echo $form->field($suppliersForm, 'shortName')->textInput(['value'=>$data['short_name']]);
echo Html::submitButton('Обновить', ['class' => 'btn btn-success']);
ActiveForm::end();
?>