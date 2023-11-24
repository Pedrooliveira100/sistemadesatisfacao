<?php
    include("cabecalho.php");
    include("../bd/conect.php");
?>

<html>

  <head>
  <link rel="stylesheet" href="../css/style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart2);
      //Gráfico 1
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Opções', 'votos'],
          ['Ótimo', <?php Consultar("otimo") ?>],
          ['Regular', <?php Consultar("regular") ?>],
          ['Ruim', <?php Consultar("ruim") ?>],
        ]);

        var options = {
          title: 'Resultados',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
      //Gráfico 2
      function drawChart2() {
      var data = google.visualization.arrayToDataTable([
        ["Element", "Total", { role: "style" } ],
        ["Ótimo", <?php Consultar("otimo") ?>, "brown"],
        ["Regular", <?php Consultar("regular") ?>, "yellow"],
        ["Ruim", <?php Consultar("ruim") ?>, "red"],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Votos por Opções",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
    </script>
  </head>
  <body>
    <div class="row">
      <div class="col-sm-6">
      <div id="piechart_3d" style="width: 100%; height: 500px;"></div>
      </div>
      <div class="col-sm-6">
      <div id="columnchart_values" style="width: 100%; height: 500px;"></div>
      </div>
    </div>
    
  </body>
</html>
<?php
    include("rodape.php");
?>