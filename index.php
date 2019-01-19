<?php
session_start();
$_SESSION['server'] = $_SERVER['HTTP_HOST']."/virtualstore";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link rel="icon" type="image/png" href="favicon.ico" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	    <meta name="viewport" content="width=device-width" />

        <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="assets/js/jquery-3.2.1.js"></script>
        <script src="assets/js/jquery-ui.js"></script>
        <script src="assets/js/chartist.js"></script>
        <script src="assets/js/chartist.min.js"></script>
        
        <!--<script src="assets/js/jquery.mobile.custom.js"></script> -->
        <script src="assets/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/chartist.css">
        <link rel="stylesheet" href="assets/css/chartist.min.css">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
        <title>Virtual Shopping | andiazher Inc</title>
        
    </head>
    <body>
        <div id="contend">
            <?php
                include("pages/dashboard.php");
            ?>
        </div>
    
    </body>
    <style>
        body {
            width:100%;
            height:100%;
            background: url("assets/images/font3.jpg") no-repeat center center fixed;
            background-color: <%=color%>;
            background-repeat: no-repeat;
            background-size: cover;
           -moz-background-size: cover;
           -webkit-background-size: cover;
           -o-background-size: cover;
        }
        @media print
        {
            .no-print
            {
                display: none !important;
                height: 0;
            }


            .no-print, .no-print *{
                display: none !important;
                height: 0;
            }
        }
        a[href]:after {
            content: none !important;
        }
        .short-text{
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</html>
