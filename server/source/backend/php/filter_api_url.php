<?php

    $ticker = $_POST["ticker-input"];
    $span = $_POST["time-span"];
    $startDate = $_POST["start-date"];
    $endDate = $_POST["end-date"];

    $api_url = "https://api.polygon.io/v2/aggs/ticker/$ticker/range/1/$span/$startDate/$endDate";
    
    require __DIR__."/commander.php";

    $data=executePythonData($api_url);

?>
