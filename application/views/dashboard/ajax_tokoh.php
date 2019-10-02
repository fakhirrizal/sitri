
			<table class="table table-striped table-bordered table-hover" id="example">
				<thead>
					<tr>
						<th style="text-align: center;"> Nama Tokoh </th>
						<th style="text-align: center;"> Jumlah Dikunjungi </th>
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
				?>
					<tr class="odd gradeX">
						<td style="text-align: center;"><?= $row['Tokoh_Dikunjungi']; ?></td>
						<td style="text-align: center;"><?= $row['Jumlah'].'x'; ?></td>
					</tr>
				<?php }} ?>
				</tbody>
			</table>
