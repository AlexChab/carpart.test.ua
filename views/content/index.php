<?php
$this->title = 'Управление магазином автозапчастей';
?>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Управление производителями автомобилей
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
<div class="dataTable_wrapper">
	<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
		<thead>
		<tr>
			<th>Производитель</th>
			<th>Код</th>

			<th>Действие</th>

		</tr>
		</thead>
		<tbody>
			<?php
				foreach ($data_site as $value){
					$data[] = $value['MFA_ID'];
				}
				foreach ($data_tecdoc as $key=>$value){
					$find = in_array($value['MFA_ID'],$data);
					if($find == true){
						echo '
							<tr class="odd gradeX success">
								<td>'.$value['MFA_BRAND'].'</td>
								<td>'.$value['MFA_ID'].'</td>
								<td><a href="/content/delmanufactures?mfa_id='.$value['MFA_ID'].'"><button type="button" class="btn btn-danger btn-xs">Удалить</button></a></td>
							</tr>';
					}
					else{
						echo '
							<tr class="odd gradeX ">
								<td>'.$value['MFA_BRAND'].'</td>
								<td>'.$value['MFA_ID'].'</td>
								<td><a href="/content/addmanufactures?mfa_id='.$value['MFA_ID'].'&mfa_brand='.$value['MFA_BRAND'].'"><button type="button" class="btn btn-success btn-xs">Добавить</button></a></td>
							</tr>';
					}
				}
			?>
	</tbody>
	</table>
	</div>
				</div>
			</div>
		</div>
</div>
