<div class="panel panel-default">
	<div class="panel-heading panel-heading-wrap">
		Производитель
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
				<a  href="/home/manfcar?manid='.$value['MFA_ID'].'"><b>'.$value['MFA_BRAND'].'</b></a>
			</li>';
			}

		}


		?>

	</div>
</div>

