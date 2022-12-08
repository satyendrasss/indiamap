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
  <h3 class="h3Heading">Gobardhan under MOPNG (SATAT) & MNRE (Waste to Energy)</h3>
  <p></p>            
<?php
	$data = '';
	$tabledatas = [];
	$getData = mysqli_query($conn,"SELECT id, state_name, state_code, mnre, mpng FROM gob_mopng_mnre order by state_name asc ");
	while($mapData = mysqli_fetch_object($getData)){
		$state_code = $mapData->state_code;
		$mpng = $mapData->mpng;
		
		$tblArr['state_name'] = $mapData->state_name;
		$tblArr['mnre'] = $mapData->mnre;
		$tblArr['mpng'] = $mpng;
		$tabledatas[] = $tblArr;
		$tblArr = array();
		
		$data.="['".$state_code."', ".$mpng."],";
	}
?>
  <div class="row">
	<div class="col-sm-6">
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-sm-6">
						<b>Gobardhan under MOPNG (SATAT) & MNRE (Waste to Energy)</b> <br> <small></small> 
					</div>
					<div class="col-sm-6">
						<select class="form-control" id="status">
							<option value="mpng">MPNG (SATAT)</option>
							<option value="mnre">MNRE (Waste to Energy)</option>
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
				<th>MPNG</th>
				<th>MNRE</th>
			  </tr>
			</thead>
			<tbody>
				<?php $totalmpng=$totalmnre=0;
					foreach($tabledatas as $tabledata){
						$mpng = $tabledata['mpng'];
						$mnre = $tabledata['mnre'];
					?>
					<tr>
						<td><?=$tabledata['state_name']?></td>
						<td align="center" ><?=$mpng; $totalmpng+=$mpng;?></td>
						<td align="center" ><?=$mnre; $totalmnre+=$mnre; ?></td>
					</tr>
				<?php		
					}
				?>
			  <tr>
				<th>Total</th>
				<th class="align-center" ><?=$totalmpng;?></th>
				<th class="align-center" ><?=$totalmnre;?></th>
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
	var SATAT = "SATAT";
	$.ajax({
		url:"ssajax.php",
		type:"get",
		data:{status:status,SATAT:SATAT},
		success:function(res){
			//console.log(res);
			$("#indiaMap").html(res);
			indiaAllState();
		}
	})
});
</script>
