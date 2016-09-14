<div class="panel panel-default">
	<div class="panel-heading panel-heading-wrap">
		Год выпуска
	</div>
	<div class="panel-body">
		<ul class="models">
			<?php $i=0;
			foreach($data as $value){
				if($i >= 9){
					$i=0;
					echo '
					<li>
					<a  href="/home/manfcar?manid='.$id.'&caryear='.$value.'01"><b>'.$value.'</b></a>
					</li>
					</ul><ul class="models">';
				}
				else{
					$i++;
					echo'
				<li>
				<a  href="/home/manfcar?manid='.$id.'&caryear='.$value.'01"><b>'.$value.'</b></a>
			</li>';
				}

			}
			?>
			</ul>
	</div>
</div>
