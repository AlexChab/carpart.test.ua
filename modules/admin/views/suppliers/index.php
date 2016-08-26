<?php
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\bootstrap\Modal;

$this->title = 'Управление - Поставщики';
?>
<div class="row">
	<div class="col-lg-12">
		<h4> Управление контентом - Поставщики</h4>
		<hr>
	</div>
	<div class="col-lg-12">

		<?php
		Modal::begin([
			'header' => '<p>Новый поставщик</p>',
			'toggleButton' => ['label' => 'Добавить','class'=>'btn btn-success'],
		]);


		$form = ActiveForm::begin(['options' => ['class' => '']]);
		echo $form->field($suppliersForm, 'name');
		echo $form->field($suppliersForm, 'shortName');
		echo Html::submitButton('Добавить', ['class' => 'btn btn-success']);
		ActiveForm::end();


		Modal::end();
		?>
	</div>
	<div class="col-lg-12">
		<hr>
	</div>
	<div class="col-lg-12">
		<?php
		echo GridView::widget([

				'dataProvider' => $dataProvider,
				'tableOptions' => [
						'class' => 'table table-striped table-bordered table-condensed'
				],

				'columns' => [
						['class' => 'yii\grid\SerialColumn'],
						
						'name',
						'short_name',
						['attribute' => 'Действие',
								'format' => 'html',
								'value' => function ($data) {
										return'<a class="btn btn-info btn-xs" href="/admin/suppliers/view?id=' . $data['id'] .' " role="button"><i class="fa fa-eye" aria-hidden="true"></i></a>
										<a class="btn btn-warning btn-xs" href="/admin/suppliers/update?id=' . $data['id'] .' " role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
										<a class="btn btn-danger btn-xs" href="/admin/suppliers/del?id=' . $data['id'] .' " role="button"><i class="fa fa-trash" aria-hidden="true"></i></a>';
								},
						],
				],
		]);

		?>
	</div>
</div>
