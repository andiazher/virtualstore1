<div class="">
    <div id="navbar">
        <?php
            include("dashboard/navbar.php");
        ?>
    </div>
    <div class="col-sm-2 no-print" id="menu">
        <?php
            include("dashboard/menu.php"); 
        ?>
    </div>
    <div class="col-sm-10" id="contenido">
        <?php
            include("dashboard/contend.php"); 
        ?>
    </div>
    <div class="col-sm-12 footerDashboard" id="footer">
        <?php
            include("dashboard/footer.php"); 
        ?>
    </div>
</div>
    <style>
        .footerDashboard {
            position: fixed;
            bottom: 0;
            right: 0;
            background: white;
          }
    </style>
    <style>
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
       
    </style>
