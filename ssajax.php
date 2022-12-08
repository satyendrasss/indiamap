<?php include_once('includes/config.php'); ?>
<?php
	if(isset($_GET['status']) && $_GET['status']!=""){
		$status = $_GET['status'];
		
		$data = '';
		$getData = mysqli_query($conn,"SELECT id, state_name, state_code, $status as ress FROM gob_sbmg_ddws_2018 order by state_name asc ");
		while($mapData = mysqli_fetch_object($getData)){
			$state_code = $mapData->state_code;
			$ress = $mapData->ress;
			
			$data.="['".$state_code."', ".$ress."],";
		}
	
		?>
		<script>
			indiaAllState();
			function indiaAllState(){
				var data = [
						<?=$data;?>
					];

					Highcharts.getJSON('http://localhost/v2/indiass.json', function (geojson) {

					  Highcharts.mapChart('mapdiv1', {
						chart: {
						  map: geojson
						},

						title: {
						  text: ''
						},

						accessibility: {
						  typeDescription: ''
						},

						mapNavigation: {
						  enabled: true,
						  buttonOptions: {
							verticalAlign: 'bottom'
						  }
						},

						colorAxis: {
						  tickPixelInterval: 100
						},
						
					  plotOptions:{
							  series:{
								  point:{
									  events:{
										  click: function(){
											  //var st_id = this.properties.st_id;
											  //alert(this.name);
											}
										}
									}
								}
							},
						
						series: [{
						  data: data,
						  keys: ['st_code', 'value'],
						  joinBy: 'st_code',
						  name: 'Total Sites',
						  states: {
							hover: {
							  color: '#a4edba'
							}
						  },
						  dataLabels: {
							enabled: true,
							format: '{point.properties.name}'
						  }
						}
						
						]
					  });
					});
			}
		</script>
		<?php
	}
	
	
	//FY 2022-23 progress 
	if(isset($_GET['status']) && $_GET['status']!="" && isset($_GET['fy']) && $_GET['fy']=="2022-23"){
		$status = $_GET['status'];
		
		$data = '';
		$getData = mysqli_query($conn,"SELECT id, state_name, state_code, $status as ress FROM gob_sbmg_ddws_2022_23 order by state_name asc ");
		while($mapData = mysqli_fetch_object($getData)){
			$state_code = $mapData->state_code;
			$ress = $mapData->ress;
			
			$data.="['".$state_code."', ".$ress."],";
		}
	
		?>
		<script>
			indiaAllState();
			function indiaAllState(){
				var data = [
						<?=$data;?>
					];

					Highcharts.getJSON('http://localhost/v2/indiass.json', function (geojson) {

					  Highcharts.mapChart('mapdiv1', {
						chart: {
						  map: geojson
						},

						title: {
						  text: ''
						},

						accessibility: {
						  typeDescription: ''
						},

						mapNavigation: {
						  enabled: true,
						  buttonOptions: {
							verticalAlign: 'bottom'
						  }
						},

						colorAxis: {
						  tickPixelInterval: 100
						},
						
					  plotOptions:{
							  series:{
								  point:{
									  events:{
										  click: function(){
											  //var st_id = this.properties.st_id;
											  //alert(this.name);
											}
										}
									}
								}
							},
						
						series: [{
						  data: data,
						  keys: ['st_code', 'value'],
						  joinBy: 'st_code',
						  name: 'Total Sites',
						  states: {
							hover: {
							  color: '#a4edba'
							}
						  },
						  dataLabels: {
							enabled: true,
							format: '{point.properties.name}'
						  }
						}
						
						]
					  });
					});
			}
		</script>
		<?php
	}
	
	
	
	//SATAT MPNG AND MNRE
	if(isset($_GET['status']) && $_GET['status']!="" && isset($_GET['SATAT']) && $_GET['SATAT']=="SATAT"){
		$status = $_GET['status'];
		
		$data = '';
		$getData = mysqli_query($conn,"SELECT id, state_name, state_code, $status as ress FROM gob_mopng_mnre order by state_name asc ");
		while($mapData = mysqli_fetch_object($getData)){
			$state_code = $mapData->state_code;
			$ress = $mapData->ress;
			
			$data.="['".$state_code."', ".$ress."],";
		}
	
		?>
		<script>
			indiaAllState();
			function indiaAllState(){
				var data = [
						<?=$data;?>
					];

					Highcharts.getJSON('http://localhost/v2/indiass.json', function (geojson) {

					  Highcharts.mapChart('mapdiv1', {
						chart: {
						  map: geojson
						},

						title: {
						  text: ''
						},

						accessibility: {
						  typeDescription: ''
						},

						mapNavigation: {
						  enabled: true,
						  buttonOptions: {
							verticalAlign: 'bottom'
						  }
						},

						colorAxis: {
						  tickPixelInterval: 100
						},
						
					  plotOptions:{
							  series:{
								  point:{
									  events:{
										  click: function(){
											  //var st_id = this.properties.st_id;
											  //alert(this.name);
											}
										}
									}
								}
							},
						
						series: [{
						  data: data,
						  keys: ['st_code', 'value'],
						  joinBy: 'st_code',
						  name: 'Total Sites',
						  states: {
							hover: {
							  color: '#a4edba'
							}
						  },
						  dataLabels: {
							enabled: true,
							format: '{point.properties.name}'
						  }
						}
						
						]
					  });
					});
			}
		</script>
		<?php
	}
?>