<!-- master -->
<?= $this->extend("layout/master"); ?>

<!-- page title -->
<?= $this->section("pagetitle"); ?>
Department's User
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->section("content"); ?>

<h1>Number of Users per Department</h1>
<hr>
<div id="googlechart" style="height: 600px; width: 100%"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    // pie chart
    google.charts.setOnLoadCallback(showChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Department', 'Num of Users'],
            <?php
            foreach ($results as $res) {
                echo "['" . $res['dept_name'] . "'," . $res['num_of_users'] . "],";
            }
            ?>
        ]);
        var options = {
            // title: 'Chart Number of Users per Department',
            // legend: {
            //     position: 'top'
            // },
            // is3D: false,
            pieHole: 0.4,
            // pieSliceText: 'label',
        };
        var chart = new google.visualization.PieChart(document.getElementById('googlechart'));
        chart.draw(data, options);
    }
</script>

<?= $this->endSection(); ?>