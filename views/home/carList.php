<div class="panel panel-default">
	<div class="panel-heading panel-heading-wrap">
		Выбор производителя
	</div>
	<div class="panel-body">
		<ul class="models">
		<?php $i=0;
		foreach($data as $value){
			if($i >= 20){
				$i=0;
				echo '	<li>
				<a  href="/home/yearlist?manid='.$value['MFA_ID'].'&mfaBrand='.$value['MFA_BRAND'].'"><b>'.$value['MFA_BRAND'].'</b></a>
			</li></ul><ul class="models">';
			}
			else{
				$i++;
				echo'
				<li>
				<a  href="/home/yearlist?manid='.$value['MFA_ID'].'&mfaBrand='.$value['MFA_BRAND'].'"><b>'.$value['MFA_BRAND'].'</b></a>
			</li>';
			}

		}


		?>
</ul> 
	</div>
</div>

