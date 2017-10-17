<?php 
    include 'database.php';

    $query = "SELECT Luminosity, Voltage, Temperature FROM mydata ORDER BY timestamp DESC";
    $qresult = $mysqli -> query($query);
    $results = array();
    while($res = $qresult->fetch_assoc()){
        $results[] = $res;
    }

    $myOutput = array();
    foreach($results as $result){
        $myOutput[] = array((float)$result['Voltage'], (float)$result['Temperature'], (int)$result['Luminosity']);
    }
    $myOutput = json_encode($myOutput);

    // print $myOutput;

    mysqli_free_result($qresult);
?>

<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawCurveTypes);

function drawCurveTypes() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Voltage');
      data.addColumn('number', 'Luminosity');
      data.addColumn('number', 'Temperature');
      data.addRows(<?php echo $myOutput; ?>);

      var options = {
        hAxis: {
          title: 'Voltage',
          curveType: 'function'
        },
        vAxis: {
          title: 'Luminosity and Temperature levels',
          curveType: 'function'
        },
        series: {
          1: {curveType: 'function'}
        }
      };

      var chart = new google.visualization.LineChart(document.getElementById('linegraph'));
      chart.draw(data, options);
    }
</script>