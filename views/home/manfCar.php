<div class="panel panel-default">
	<div class="panel-heading panel-heading-wrap">
		Модель
	</div>
	<div class="panel-body">
		<ul class="models">
			<?php $i=0;
			foreach($data as $value){
				if($i >= 20){
					$i=0;
					echo '</ul><ul class="models">';
				}
				else{
					$i++;
					echo'
				<li>
				<a  href="/home/manf"><b>'.$value['MOD_CDS_TEXT'].'</b></a>
			</li>';
				}

//			echo '<ul class="models">
//			<li>
//				<a  href="#"><b>'.$value['MFA_BRAND'].'</b></a>
//			</li>
//		</ul>';

			}


			?>

	</div>
</div>

