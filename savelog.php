<?php
require_once('config.php');

session_start();

// Get the log data from the request
if(isset($_POST)){
    $logData = $_POST['logData'];

    // Convert the log data to an array
    $logArray = explode("\n", $logData);

    // Loop through each row of the log data
    foreach ($logArray as $logRow) {
        // Convert the row data to an array
        $logRowArray = explode(",", $logRow);

        // Extract the individual fields from the row data
        $session = $db->quote($logRowArray[0]);
        $date = $db->quote($logRowArray[1]);
        $startTime = $db->quote($logRowArray[2]);
        $endTime = $db->quote($logRowArray[3]);
        $time = $db->quote($logRowArray[4]);
        $description = $db->quote($logRowArray[5]);

        // Insert the data into the database
        $stmt = $db->prepare("INSERT INTO location_update_log (session, date, startTime, endTime, time, description) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $session);
        $stmt->bindParam(2, $date);
        $stmt->bindParam(3, $startTime);
        $stmt->bindParam(4, $endTime);
        $stmt->bindParam(5, $time);
        $stmt->bindParam(6, $description);
        $result = $stmt->execute();
        if($result){
            echo 'Successfully saved.';
        } else{
            echo 'There were errors while saving the data.';
        }
    }
}else{
    echo 'No data';
}
?>
