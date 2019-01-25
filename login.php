<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            include("pages/head.php");
        ?>
        <title>Login | SCP | by andiazher Inc</title>
    </head>
    <body>
        <div class="">
            <nav class="navbar navbar-primary navbar-static-top" style="background: transparent; color: white; text-shadow: 2px 2px 1px black;">
                <h3 class="col-md-offset-1 col-sm-offset-2"></h3>
                <a class="navbar-brand col-md-offset-1 col-sm-offset-2" href="index.php"><img src="assets/images/marketLogo.png" alt="My Store" height="100" width="460"></a>
            </nav>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-6 col-lg-offset-8 col-md-offset-7 col-sm-offset-5 setTopToFloorScreenDiv">
            <div class="panel " style="background: transparent;">
                <div class="panel-headingt text-center" style="text-shadow: 2px 2px 2px black; color: white;">
                    <br>
                    <b>Ingresa con tu cuenta</b>
                </div>
                <div class="panel-body ">
                    <p class="text-center text-danger" id="error" style="text-shadow: 2px 2px 2px black; color: white;">
                        <?php
                            if (isset($_SESSION['user'])){
                                echo("¡Hola ".$_SESSION['username'].", ingresa nuevamente tus credenciales");
                            }
                        ?>
                    </p>
                    <p class="text-center text-danger" id="error" style="text-shadow: 2px 2px 2px black; color: red;">
                        <?php
                            if (isset($_GET['msglog'])){
                                echo($_GET['msglog']);
                            }
                        ?>
                    </p>
                    <form action="loginApp.php?action=execute&login=true" id="loginForm" method="post">
                        <input type="hidden" value="login" name="param">
                        <div class="form-group">
                            <!--<label for="exampleInputEmail1">Username</label>-->
                            <input type="text" class="form-control" id="exampleInputEmail1"  name="user" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <!--<label for="exampleInputPassword1">Password</label>-->
                            <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Password" required>
                            <input type="hidden" name="key" value="<%=session.getId()%>">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn  btn-block" onclick="validate()">Iniciar sessión</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center" style="text-shadow: 2px 2px 2px black; color: white;">
                <p class="" style="color: white;">by andiazher Inc</p>
            </div>
        </div>
        
    </body>
    <!-- 2F2D2D-->
    <style>
        body {
            width:100%;
            height:100%;
            background: url("assets/images/font23.jpg") no-repeat center center fixed;
            background-color: #FFFFFF; 
            background-repeat: no-repeat;
            background-size: cover;
           -moz-background-size: cover;
           -webkit-background-size: cover;
           -o-background-size: cover;
        }
        .setTopToFloorScreenDiv{
            height:100%;
            background-color: black;
            opacity: 0.8;
            top:0px;
        }
        .navbar{
            background: white;
        }

        
    </style>
</html>
