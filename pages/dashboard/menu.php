
        <div class="panel panel-default" style="height: 100%"> <!--style="background: transparent;"-->
            <div class="panel-heading" > <!--style="background-color: black; opacity: 0.9; color: white;"-->
                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Opciones
            </div>
            <div class="panel-body short-text" id="contentMenu"> <!-- style="background-color: black; opacity: 0.8; color: white;"-->
                <?php  
                    $cc = curl_init(); 
                    curl_setopt($cc, CURLOPT_URL, $GLOBALS['api']."get_menus?ciudad_id=1"); 
                    curl_setopt($cc, CURLOPT_HEADER, 0);
                    curl_setopt($cc, CURLOPT_RETURNTRANSFER, true); 
                    curl_setopt($cc, CURLOPT_POST , true); 
                    $response =  curl_exec($cc);
                    curl_close($cc);
                    $response = json_decode($response);
                    if ($response->response){
                        $menus = $response->data->menus_config;
                        $active = true;
                        echo("<ul class=\"nav nav-pills nav-stacked\">");
                        foreach($menus as $menu){
                            $active_class="";
                            if($active){
                                $active_class=" active";
                                $active = false;
                            }
                            echo "<li role=\"presentation\" class=\"".$active_class."\">";
                            if($menu->ispageorurl){
                                echo "<a href=\"#load\" onclick=\"loadContend('".$menu->title."','".$menu->page."')\">".$menu->name."</a>";
                            }
                            else{
                                echo "<a href=\"".$menu->page."\" target=\"_blank\">".$menu->name."</a>";
                            }
                            echo "</li>";
                        }
                        echo("</ul>");
                        
                    }
                    else{
                        echo("<img src=\"assets/images/loading_spinner.gif\" height=\"15\" width=\"15\">");
                        echo "Loading menus, please wait .... ";
                    }
                ?>
            </div>
            <div class="panel-footer" > <!--style="background-color: black; opacity: 0.9; color: white;"-->
                
            </div>
            
        </div>
