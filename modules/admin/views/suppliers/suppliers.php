<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<h3>Добавление поставщика</h3>

<?php
$form = ActiveForm::begin(['options'=>['class'=>'col-sm-4']]);
echo $form->field($suppliersForm, 'name');
echo $form->field($suppliersForm, 'shortName');
echo Html::submitButton('Сохранить', ['class' => 'btn btn-success']);
ActiveForm::end();
?>