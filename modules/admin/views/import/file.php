<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>
<?php $this->title = 'Управление - импорт прайсов(файлы более 8 Мегабайт) ';?>

<div class="row">
	<div class="col-lg-12">
		<h3> Импорт прайса поставщика</h3>
		<?php
		$form = ActiveForm::begin(['options' =>['class'=>'col-sm-4 form form-horizontal']]);
		echo  $form->field($model, 'suppliers')->dropDownList(ArrayHelper::map(\app\models\Suppliers:: find()->all(), 'id', 'name'));
		echo Html::submitButton('Импорт',['class' => 'btn btn-success']);
		ActiveForm::end();
		?>
	</div>
	<div class="col-lg-4">
		<?php
		if($error!=null){
			echo '<br> <p class="text-danger-danger">'.$error.'</p>';
		}
		?>

	</div>
</div>


