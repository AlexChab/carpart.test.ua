<?php
$this->title = 'Управление магазином автозапчастей';
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				DataTables Advanced Tables
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
<div class="dataTable_wrapper">
	<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
		<thead>
		<tr>
			<th>Производитель</th>
			<th>Код</th>
			<th>Добавить</th>
			<th>Удалить</th>

		</tr>
		</thead>
		<tbody>
		<?php
		foreach ($data as $value){
			echo '
			<tr class="odd gradeX">
			<td>'.$value['MFA_BRAND'].'</td>
			<td>'.$value['MFA_ID'].'</td>
			<td></td>
			<td></td>
			
		</tr>
			
			';
		}

		?>

		</tbody>
	</table>
	</div>
				</div>
			</div>
		</div>
</div>
