<div class="panel panel-default">
	<div class="panel-heading panel-heading-wrap">
		Модель
	</div>
	<div class="panel-body">

		<?php foreach($data as $value){
			//print_r($value);
		//	echo $value['MFA_BRAND'];
			echo '<ul class="models">
			<li>
				<a  href="#"><b>'.$value['MFA_BRAND'].'</b></a>
			</li>
		</ul>';

		}


		?>

	</div>
</div>

