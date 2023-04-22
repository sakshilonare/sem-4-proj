<?php 

	session_start();
?>
<html>
    <head>
        <title>Report</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="log.css">
    </head>
    <body>
        <div class="split left">
            <div class="centered">
                <div class="log-modal-content">
                <form action="savelog.php" method="post">
                    <table class="table table-striped table-responsive-md" id="logDataTable" border="1">
                        <thead>
                            <tr>
                                <th scope="col">Session</th>
                                <th scope="col">Date</th>
                                <th scope="col">Start Time</th>
                                <th scope="col">End Time</th>
                                <th scope="col">Time</th>
                                <th scope="col">Description</th>
                                <!-- <th scope="col"></th> -->
                            </tr>
                        </thead>
                        <tbody id="locationUpdateLog"></tbody>
                    </table>
                    <div class="container d-flex justify-content-center">
                        <span id="NoDataLoggedText">No data logged yet</span>
                    </div>
                </div>
            </div>
          <div class="modal-footer">
            <div class="container d-flex justify-content-center">
                <button type="button" class="btn btn-primary button-pressed-no-shadow shadow-none" id="clearButton">Clear Log</button>
                <!-- <button type="button" onclick="addDataToLog1()">download CSV</button> -->
            </div>
         </div>
         </div>
                
          
          <div class="split right">
            <div class="centered"> hello
            </div>
          </div>
          <!-- <script src="app.js"></script> -->
    </body>
</html>
