<?php
session_start();
$_SESSION['server'] = $_SERVER['HTTP_HOST']."/virtualstore";
$GLOBALS['api'] = "http://localhost/api1.virtualstore/index.php/api/1.0/";
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            include("pages/head.php");
        ?>
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
            background: url("assets/images/font4.jpg") no-repeat center center fixed;
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
