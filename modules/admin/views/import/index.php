<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

?>
<?php if (isset($data)){
	echo '<h3>'.$data.'</h3>';
}?>

<?php $form = ActiveForm::begin(['options' =>['enctype' => 'multipart/form-data', 'class'=>'col-sm-12 form form-horizontal']]) ?>

<?= $form->field($model, 'suppliers')->dropDownList(ArrayHelper::map(\app\models\Suppliers:: find()->all(), 'id', 'name')) ?>

<?= $form->field($model, 'dataFile',  ['inputOptions'=>['class'=>'']])->fileInput()->hint('') ?>

<?= Html::submitButton('Загрузить в базу',['class' => 'btn btn-success'])?>
<? if($error!=null){
	echo 'Файл загружен';
}?>

