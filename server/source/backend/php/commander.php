<?php 

# Execute Static Data

function getStaticData($apiUrl){
    $command = escapeshellcmd("python3 ../python/gmd_request.py " . escapeshellarg($apiUrl));

    $output = shell_exec($command);
    
    if ($output == null) {
        
        return null;
    }

    return $output;
}

# Execute Predicted Data Attempt

function prognosticateData($ticker) {

    $py_path = "../python/prognosticate_data.py"; # Module not yet completed, please do not run yet

    $command = escapeshellcmd("python3 $py_path ". escapeshellarg($ticker));

    $output = shell_exec($command);

    if ($output == null) {
        
        return null;
    }

    return $output;

}
