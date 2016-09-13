<div class="panel panel-default">
	<div class="panel-heading panel-heading-wrap">
		Модели по производителю
	</div>
	<div class="panel-body">
		<ul class="models">
			<?php $i=0;
			foreach($data as $value){
				if($i >= 20){
					$i=0;
					echo '<li>
				<a  href="/home/carmodel?carid='.$value['MOD_ID'].'"><b>'.$value['MOD_CDS_TEXT'].'</b></a>
			</li></ul><ul class="models">';
				}
				else{
					$i++;
					echo'
				<li>
				<a  href="/home/carmodel?carid='.$value['MOD_ID'].'"><b>'.$value['MOD_CDS_TEXT'].'</b></a>
			</li>';
				}

//			echo '<ul class="models">
//			<li>
//				<a  href="#"><b>'.$value['MFA_BRAND'].'</b></a>
//			</li>
//		</ul>';

			}


			?>
</ul>
	</div>
</div>

