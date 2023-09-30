<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require("classes/pagination.php");
$quest = new Questions();

$dataPoints = array();

$userData = $quest->plotUserDataGraph();
foreach($userData as $value){
    $data = array(
        "y" => $value['option_value'], "label" => $value['question_letter']
    );

    array_push($dataPoints, $data);
    
}


     
    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
    <script>
    window.onload = function() {
     
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title:{
            text: "Plot of user score"
        },
        axisY: {
            title: "Sum of points",
            includeZero: false,
            prefix: "",
            suffix:  ""
        },
        data: [{
            type: "column",
            yValueFormatString: "",
            indexLabel: "{y}",
            indexLabelPlacement: "inside",
            indexLabelFontWeight: "bolder",
            indexLabelFontColor: "white",
            dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
     
    }
    </script>
    </head>
    <body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    </body>
    </html>                              