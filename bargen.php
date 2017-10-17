<?php 
    include 'database.php';

    $query = "SELECT Voltage, Luminosity, Temperature FROM mydata";
    $qresult = $mysqli -> query($query);
    $results = array();
    while($res = $qresult->fetch_assoc()){
        $results[] = $res;
    }

    $bar_graph_data = array();
    foreach($results as $result){
        $bar_graph_data[] = array((float)$result['Voltage'], (int)$result['Luminosity'], (float)$result['Temperature']);
    }
    $bar_graph_data = json_encode($bar_graph_data);

    // print $bar_graph_data;

    mysqli_free_result($qresult);
?>

<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawTrendlines);

function drawTrendlines() {
      var data = new google.visualization.DataTable();
      data.addColumn('number', 'Voltage');
      data.addColumn('number', 'Luminosity');
      data.addColumn('number', 'Temperature');
      data.addRows(<?php echo $bar_graph_data ?>);

      var options = {
        title: 'Voltage, Luminosity, Temperature',
        trendlines: {
          0: {type: 'linear', lineWidth: 10, opacity: .3},
          1: {type: 'exponential', lineWidth: 10, opacity: .3}
        },
        hAxis: {
          title: 'Voltage',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Luminosity & Temperature levels'
        }
      };

      var chart = new google.visualization.ColumnChart(document.getElementById('bargraph'));
      chart.draw(data, options);
    }
</script>