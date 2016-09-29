<?php
if (!isset($_SESSION)) {
    session_start();
}
if ($_SESSION['username'] == "" || $_SESSION['group'] == "") {
    header("Location:../login/index.php");
    exit;
}
?>

<?php
include '../../common/dbconnection.php';
$objDBConnection = new dbconnection();
$connection = $objDBConnection->connection();
$year = $_REQUEST['year'];
?>

<html>
    <head>
        <title>Hall reservations count</title>
        <script src="../../js/reports/fusioncharts/js/fusioncharts.js"></script>
    </head>
    <body>
        <?php
        include("./fusion-charts/fusioncharts.php");

        // Form the SQL query that returns the top 10 most populous countries
        $strQuery = "SELECT count(*) count, hall_name AS hall FROM reservation r,"
                . "hall_reservation hr, customer c, hall h WHERE "
                . "r.reservation_id=hr.reservation_id AND hr.hall_id=h.hall_id "
                . "AND r.customer_id=c.customer_id AND year(reservation_date)='$year' "
                . "GROUP BY hall_name;";

        $result = $connection->query($strQuery) or exit("Error code ({$connection->errno}): {$connection->error}");

        // If the query returns a valid response, prepare the JSON string
        if ($result) {
            $arrData = array(
                "chart" => array(
                    "caption" => "Count of the reservations per hall",
                    "subCaption" => "Aqua Pearl Lake Resort-$year", 
                    "paletteColors" => "#0075c2,#1aaf5d,#f2c500,#f45b00,#8e0000",
                    "bgColor" => "#ffffff",
                    "showBorder" => "1",
                    "use3DLighting" => "0",
                    "showShadow" => "0",
                    "enableSmartLabels" => "0",
                    "startingAngle" => "0",
                    "showPercentValues" => "1",
                    "showPercentInTooltip" => "0",
                    "decimals" => "1",
                    "captionFontSize" => "16",
                    "subcaptionFontSize" => "14",
                    "subcaptionFontBold" => "0",
                    "toolTipColor" => "#ffffff",
                    "toolTipBorderThickness" => "0",
                    "toolTipBgColor" => "#000000",
                    "toolTipBgAlpha" => "80",
                    "toolTipBorderRadius" => "2",
                    "toolTipPadding" => "5",
                    "showHoverEffect" => "1",
                    "showLegend" => "1",
                    "legendBgColor" => "#ffffff",
                    "legendBorderAlpha" => "0",
                    "legendShadow" => "0",
                    "legendItemFontSize" => "10",
                    "legendItemFontColor" => "#666666",
                    "useDataPlotColorForLabels" => "1",
                    "exportenabled" => "1",
                    "exportatclient" => "0",
                    "exporthandler" => "http://export.api3.fusioncharts.com/",
                    "html5exporthandler" => "http://export.api3.fusioncharts.com/"
                )
            );
            $arrData["data"] = array();

            // Push the data into the array
            while ($row = mysqli_fetch_array($result)) {
                array_push($arrData["data"], array(
                    "label" => $row["hall"],
                    "value" => $row["count"]
                        )
                );
            }
            $jsonEncodedData = json_encode($arrData);

            $pieChart = new FusionCharts("pie2D", "all-halls-yearly-chart", 800, 550, "chart-1", "json", $jsonEncodedData);

            // Render the chart
            $pieChart->render();
        }
        ?>
        <div id="chart-1" style="text-align: center"></div>
    </body>
</html>