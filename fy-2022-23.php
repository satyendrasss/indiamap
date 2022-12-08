<?php include_once('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="assets/css/custom.css">
	
</head>
<body>
<?php include_once('includes/menu.php');?>

<div class="container">
  <h3 class="h3Heading">FY 2022-23 progress</h3>
           
<?php
	$data = '';
	$tabledatas = [];
	$getData = mysqli_query($conn,"SELECT id, state_name, state_code, construction_in_progress, completed FROM gob_sbmg_ddws_2022_23 order by state_name asc ");
	while($mapData = mysqli_fetch_object($getData)){
		$state_code = $mapData->state_code;
		$completed = $mapData->completed;
		
		$tblArr['state_name'] = $mapData->state_name;
		$tblArr['construction_in_progress'] = $mapData->construction_in_progress;
		$tblArr['completed'] = $completed;
		$tabledatas[] = $tblArr;
		$tblArr = array();
		
		$data.="['".$state_code."', ".$completed."],";
	}
?>
  <div class="row">
	<div class="col-sm-6">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-6">
						<b>FY 2022-23 progress</b> <br> <small></small> 
					</div>
					<div class="col-sm-6">
						<select class="form-control" id="status">
							<option value="completed">Completed</option>
							<option value="construction_in_progress">Construction In Progress</option>
						</select>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div id="mapdiv1"></div>
			</div>
		</div>
		
	</div>
	
	<div class="col-sm-6" style="height: 490px; overflow: auto;">
		<table class="table table-bordered table-striped">
			<thead>
			  <tr>
				<th>State Name</th>
				<th>Construction In Progress</th>
				<th>Completed</th>
			  </tr>
			</thead>
			<tbody>
				<?php $totalInProgress=$totalcompleted=0;
					foreach($tabledatas as $tabledata){
						$construction_in_progress = $tabledata['construction_in_progress'];
						$completed = $tabledata['completed'];
					?>
					<tr>
						<td><?=$tabledata['state_name']?></td>
						<td align="center" ><?=$construction_in_progress; $totalInProgress+=$construction_in_progress;?></td>
						<td align="center" ><?=$completed; $totalcompleted+=$completed; ?></td>
					</tr>
				<?php		
					}
				?>
			  <tr>
				<th>Total</th>
				<th class="align-center" ><?=$totalInProgress;?></th>
				<th class="align-center" ><?=$totalcompleted;?></th>
			  </tr>
			</tbody>
		  </table>
	</div>
	
  </div>
  
</div>

</body>
</html>


<script src="assets/highcharts/highmaps.js"></script>
<script src="assets/highcharts/exporting.js"></script>
<!--
<script src="assets/highcharts/offline-exporting.js"></script>
<script src="assets/highcharts/accessibility.js"></script>
-->

<span id="indiaMap">
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
</span>

<script>
$("#status").on("change", function(){
	var status = $("#status").val();
	//console.log(status);
	var fy = "2022-23";
	$.ajax({
		url:"ssajax.php",
		type:"get",
		data:{status:status,fy:fy},
		success:function(res){
			//console.log(res);
			$("#indiaMap").html(res);
			indiaAllState();
		}
	})
});
</script>
