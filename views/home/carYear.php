<div class="panel panel-default">
	<div class="panel-heading panel-heading-wrap">
		<?php echo '<a href="/home"><i class="fa fa-home text-danger" aria-hidden="true"></i></a> - <a href="/home"> <b class="text-info"> '. $mfaBrand.'</b></a> '; ?> - выбор года выпуска
	</div>
	<div class="panel-body">
		<ul class="models">
			<?php $i=0;
			foreach($data as $value){
				if($i >= 9){
					$i=0;
					echo '
					<li>
					<a  href="/home/manfcar?manid='.$id.'&year='.$value.'&mfaBrand='.$mfaBrand.'&caryear='.$value.'01"><b>'.$value.'</b></a>
					</li>
					</ul><ul class="models">';
				}
				else{
					$i++;
					echo'
				<li>
				<a  href="/home/manfcar?manid='.$id.'&year='.$value.'&mfaBrand='.$mfaBrand.'&caryear='.$value.'01"><b>'.$value.'</b></a>
			</li>';
				}

			}
			?>
			</ul>
	</div>
</div>
