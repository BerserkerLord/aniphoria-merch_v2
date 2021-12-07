<?php
/*$json = json_encode($xmes);
$json = str_replace("{", "[", $json);
$json = str_replace("}", "]", $json);*/
$colors = array();
array_push($colors, 'gray');
array_push($colors, 'red');
array_push($colors, 'darkcyan');
array_push($colors, 'blue');
array_push($colors, 'brown');
array_push($colors, 'orange');
array_push($colors, 'cyan');
array_push($colors, 'green');
array_push($colors, 'maroon');
array_push($colors, 'purple');
array_push($colors, 'darkred');
array_push($colors, 'skyblue');
?>
<div class="administrador index content">
    <h2><?= __('Gráficos') ?></h2>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <div id="xmes" style="width:100%; max-width:600px; height:500px;"></div>
            </div>
            <div class="col-4">
                <div id="xanio" style="width:100%; max-width:600px; height:500px;"></div>
            </div>
            <div class="col-4">
                <div id="xsemana" style="width:100%; max-width:600px; height:500px;"></div>
            </div>
        </div>
    </div>
</div>
<script>
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawChar);
    google.charts.setOnLoadCallback(drawCha);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Mes', 'Ganancias', { role: 'style' }],
            <?php
                $csem = 0;
                shuffle($colors);
                foreach($xmes as $mes){
                    $csem++;
                    $cantidad = $mes[0];
                    $mess = $mes[1];

            ?>
            ['<?php echo $mess; ?>', <?php echo $cantidad; ?>, 'color: <?php echo $colors[$csem]; ?>'],
            <?php } ?>
        ]);

        var options = {
            title:'Ganancias por mes',
            legend: 'none'
        };

        var chart = new google.visualization.BarChart(document.getElementById('xmes'));
        chart.draw(data, options);
    }

    function drawChar() {
        var data = google.visualization.arrayToDataTable([
            ['Ganancias', 'Año', { role: 'style' }],
            <?php
                $csem = 0;
                shuffle($colors);
                foreach($xanio as $anio){
                    $csem++;
                    $cantidadd = $anio[0];
                    $anioo = $anio[1];
            ?>
            [<?php echo $anioo; ?>, <?php echo $cantidadd; ?>, 'color: <?php echo $colors[$csem]; ?>'],
            <?php } ?>
        ]);
        var options = {
            title: 'Ganancias por año',
            hAxis: {format: '####', title: 'Año'},
            vAxis: {title: 'Ganancias'},
            legend: 'none'
        };
        var chart = new google.visualization.ScatterChart(document.getElementById('xanio'));
        chart.draw(data, options);
    }

    function drawCha() {
        var data = google.visualization.arrayToDataTable([
            ['Semana', 'Ganancias', { role: 'style' }],
            <?php
                $csem = 0;
                shuffle($colors);
                foreach($xsemana as $semana){
                    $csem++;
                    $cantidad = $semana[0];
                    $sem = 'Semana '.$csem;
            ?>
            ['<?php echo $sem; ?>', <?php echo $cantidad; ?>, 'color: <?php echo $colors[$csem]; ?>'],
            <?php } ?>
        ]);

        var options = {
            title:'Ganancias por semana',
            legend: 'none'
        };

        var chart = new google.visualization.BarChart(document.getElementById('xsemana'));
        chart.draw(data, options);
    }
</script>
