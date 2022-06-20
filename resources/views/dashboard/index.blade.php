
@extends('layout_admin')
@section('title','Dashboard' )
@section('content')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  var sessao = <?php echo $sessao; ?>;
  console.log(sessao);
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable(sessao);
    var options = {
      title: 'Sessões por Ano',
      curveType: 'function',
      legend: { position: 'bottom' }
    };
    var chart = new google.visualization.LineChart(document.getElementById('linechart'));
    chart.draw(data, options);
  }
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  var recibo = <?php echo $recibo; ?>;
  console.log(recibo);
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable(recibo);
    var options = {
      title: 'Recibos por Ano',
      curveType: 'function',
      legend: { position: 'bottom' }
    };
    var chart2 = new google.visualization.LineChart(document.getElementById('linechart2'));
    chart2.draw(data, options);
  }
</script>
<div>
<h1>Estatisticas</h1>
<div id="linechart" style="width: 900px; height: 500px"></div>
</div>
<div>
    <h1></h1>
    <div id="linechart2" style="width: 900px; height: 500px"></div>
</div>
@endsection


