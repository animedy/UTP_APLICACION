<?php include 'menu.php'; ?>
 <div class="wrapper wrapper-content animated fadeInRight ecommerce">


            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                    <div class="ibox-title">
                        <h5>Platos Más Vendidos</h5>
                    </div>
                        <div class="ibox-content">
                        	<div id="piechart" style="width: 900px; height: 500px"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
<?php include 'footer.php'; ?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Platos', 'Cantidad'],
          <?php foreach ($cantidades as $cantidad) {
           ?>
          ['<?php echo $cantidad->nombres;?>',     <?php echo $cantidad->Cantidad;?>],
          <?php
          } ?>
        ]);

        var options = {
          title: 'Platos Más Vendidos'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    