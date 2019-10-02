
			<table class="table table-striped table-bordered table-hover" id="example">
				<thead>
					<tr>
						<th style="text-align: center;"> Segmentasi </th>
						<th style="text-align: center;"> Jumlah Sebaran </th>
					</tr>
				</thead>
				<tbody>
				<?php
					foreach ($rw as $key => $row) {
						if($rw==NULL){
							echo'
							<tr class="odd gradeX"><td style="text-align: center;" rowspan="2">Data masih kosong!</td></tr>
							';
						}else{
							if($row['Jumlah']=='0'){
								echo '';
							}else{
				?>
					<tr class="odd gradeX">
						<td style="text-align: center;"><?= $row['Segmentasi']; ?></td>
						<td style="text-align: center;"><?= $row['Jumlah'].'x'; ?></td>
					</tr>
				<?php }}} ?>
				</tbody>
			</table>
