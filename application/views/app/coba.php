    <!-- memasukan jquery sebagai plugin tambahan -->
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <!-- membuat fungsi untuk menampilkan diagram batang ke dalam <div id="suara"></div> -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('#suara').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'Jumlah Perolehan Suara'
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: [
                    'Jumlah Suara'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total'
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [   
                   
				  <?php
						//$arrayPie = array();
						$url5 = 'https://andro.sitri.online/api/calegtask/countsegmenall/asc';
						$kategori_keperluan = $this->Main_model->getAPI($url5);
							foreach ($kategori_keperluan as $key => $row) {
								echo "{ name: '".$row['Segmentasi']."',data: [".$row['Jumlah']."]},";
							}
						?>
            ]
        });
    });
    </script>


<!-- awal sebagai id untuk menampilkan diagram batang -->
<div id="suara"></div>
<!-- akhir -->

<!-- memasukan highcharts ke dalam proyek sebagai plugin utama -->
