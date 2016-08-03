<div class="panel panel-default">
	<div class="panel-heading panel-heading-wrap">
		Категории запчастей
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-xs-6 col-sm-6 col-md-4">
				<p class="h4 text-primary text-center"><i class="fa fa-folder-open-o text-success" aria-hidden="true"> </i><b> Tree</b></p>
				<ul class="category">
<!--					[STR_ID] => 10101-->
<!--					[STR_DES_TEXT] => Кузов-->
<!--					[DESCENDANTS] => 1-->
					<?php
					foreach ($data as $value){
						if($value['DESCENDANTS'] == 1 ){
							echo '<li><a href="/home/gettree?str_id='.$value['STR_ID'].'&typ_id='.$typ_id.'">'.$value['STR_DES_TEXT'].'</a></li>';
						}
						else{
							echo '<li><a href="/home/getmarket?str_id='.$value['STR_ID'].'&typ_id='.$typ_id.'">'.$value['STR_DES_TEXT'].'</a></li>';
						}

					}

					?>


				</ul>
			</div>
		</div>
	</div>
</div>