<div class="panel panel-default">
	<div class="panel-heading panel-heading-wrap">
		<?php echo '<a href="/home"><i class="fa fa-home text-danger" aria-hidden="true"></i></a> -  <b class="text-info"> '. $mfaBrand.'</b> - <b class="text-info"> '. $year.'</b> </a>  '; ?> - выбор модели
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
				<a  href="/home/carmodel?carid='.$value['MOD_ID'].'&model='.$value['MOD_CDS_TEXT'].'&mfaBrand='.$mfaBrand.'&year='.$year.' "><b>'.$value['MOD_CDS_TEXT'].'</b></a>
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

