<?php 
include"admin/connection.php";

$sql_Assigned = mysql_query("SELECT `status`,  COUNT(*) AS `count` FROM equipment WHERE status='Assigned'");
  $data_Assigned  = mysql_fetch_array($sql_Assigned);
  $Assigned = $data_Assigned['count'];


  $sql_broken= mysql_query("SELECT `equipment_status`,  COUNT(*) AS `count` FROM equipment WHERE equipment_status='Broken'");
  $data_broken = mysql_fetch_array($sql_broken);
  $broken = $data_broken['count'];

    $sql_Unassigned= mysql_query("SELECT `status`,  COUNT(*) AS `count` FROM equipment WHERE status='Unassigned'");
  $data_Unassigned = mysql_fetch_array($sql_Unassigned);
  $Unassigned = $data_Unassigned['count'];


    $sql_Uptodate= mysql_query("SELECT `equipment_status`,  COUNT(*) AS `count` FROM equipment WHERE equipment_status='Up To Date'");
  $data_Uptodate = mysql_fetch_array($sql_Uptodate);
  $Uptodate = $data_Uptodate['count'];

     $sql_Expired= mysql_query("SELECT `equipment_status`,  COUNT(*) AS `count` FROM equipment WHERE equipment_status='Expired'");
  $data_Expired = mysql_fetch_array($sql_Expired);
  $Expired = $data_Expired['count'];

 ?>

<input type="hidden" id="assigned" value="<?php echo $Unassigned; ?>">

<div class="chart-wrapper">
<div id="piechart" class="pie-inner"></div>
</div>

<!-- <script type="text/javascript" src="PieChart/"></script>
 -->
<script type="text/javascript" src="PieChart/pie.js">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {  

  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['Assigned',  <?php echo $Assigned; ?>],
  ['Broken', <?php echo $broken; ?>],
  ['Unassigned', <?php echo $Unassigned; ?>],
  ['Up To Date', <?php echo $Uptodate; ?>],
  ['Expired', <?php echo $Expired; ?>]


]);

  /*// Optional; add a title and set the width and height of the chart
  var options = {'title':'Equipment Status Pie Chart', 'width':100%, 'height':100%};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);*/

  var options = {
    title: 'My Daily Activities'
  };

  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
  }

  $(window).on("throttledresize", function (event) {
      var options = {
          width: '100%',
          height: '100%'
      };

      var data = google.visualization.arrayToDataTable([]);
      drawChart(data, options);
  });
</script>
