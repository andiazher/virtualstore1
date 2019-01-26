
<nav class="navbar navbar-default"> <!--style="background: transparent;-->
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="#reload"><img src="assets/images/marketLogo.png" alt="My Store" height="25" width="115"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" id="menusnavbar">
        <!-- HERE CODE MENUS -->
        <?php  
            $cc = curl_init(); 
            curl_setopt($cc, CURLOPT_URL, $GLOBALS['api']."get_navbars?ciudad_id=1"); 
            curl_setopt($cc, CURLOPT_HEADER, 0);
            curl_setopt($cc, CURLOPT_RETURNTRANSFER, true); 
            curl_setopt($cc, CURLOPT_POST , true); 
            $response =  curl_exec($cc);
            curl_close($cc);
            $response = json_decode($response);
            if ($response->response){
              $navbars = $response->data->navbars;
              $active = true;
              foreach($navbars as $navbar){
                $active_class="";
                if($active){
                  $active_class=" active";
                  $active = false;
                }
                if($navbar->isdropdown){
                  echo("<li class=\"dropdown".$active_class."\">\n");
                  echo("<a class=\"dropdown-toggle\" data-toggle=
                    \"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
                    ".$navbar->name." <span class=\"caret\"></span></a>");
                  echo("</li>\n");
                }
                else{
                  echo("<li class=\"".$active_class."\"><a href=\"#".$navbar->name."\">".$navbar->name."</a></li>\n");
                }
              }
              
            }
            else{
              echo("<img src=\"assets/images/loading_spinner.gif\" height=\"15\" width=\"15\">");
            }
        ?>
      </ul>
        <form class="navbar-form navbar-left" action="search#search" method="get" id="search">
        <div class="form-group">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for..." name="q" value="" required>
            <input type="hidden" name="sessionId" value="<%=sessionId%>">
            <input type="hidden" name="key" value="<%=key%>">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </span>
            </div><!-- /input-group -->
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <?php
          if (isset($_SESSION['user']) && isset($_SESSION['username'])){
            echo("<li class=\"dropdown\">");
            echo("<a class=\"dropdown-toggle\" data-toggle=
            \"dropdown\" role=\"button\" aria-haspopup=\"true\" aria-expanded=\"false\">
            ".$_SESSION['username']." <span class=\"caret\"></span></a>");
            echo("<ul class=\"dropdown-menu\">");
            echo("<li><a href=\"#profile\">Mi cuenta</a></li>");
            echo("<li role=\"separator\" class=\"divider\"></li>");
            echo("<li><a href=\"loginApp.php?action=execute&logout=true\">Cerrar Sesión</a></li>");
            echo("</ul>");
            echo("</li>");
          }
          else{
            echo("<li><a href=\"login.php\">Iniciar Sesion</a></li>");
          }
        ?>
        
      </ul>
    </div>
  </div>
</nav>

