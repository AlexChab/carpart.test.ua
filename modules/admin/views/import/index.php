<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(['options' =>['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'dataFile')->fileInput() ?>
<?= Html::submitButton('Отправить')?>
<? if($error!=null){
	echo 'Файл загружен';
}?>



<?php ActiveForm::end() ?>
<?php
//print_r($data);

?>