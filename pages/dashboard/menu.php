<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <div class="panel panel-default" style="height: 100%"> <!--style="background: transparent;"-->
            <div class="panel-heading" > <!--style="background-color: black; opacity: 0.9; color: white;"-->
                <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Options
            </div>
            <div class="panel-body short-text" id="contentMenu"> <!-- style="background-color: black; opacity: 0.8; color: white;"-->
                <img src="assets/images/loading_spinner.gif" height="15" width="15">
                Loading menus, please wait .... 
            </div>
            <div class="panel-footer" > <!--style="background-color: black; opacity: 0.9; color: white;"-->
                
            </div>
            
        </div>
    </body>
    <script type="text/javascript">
        function setContendToMenu(html){
            $("#contentMenu").html(html);   
        }
        
        function loadMenus(){
            var s1= "<%=sessionId%>";
            var s2= "<%=key%>";
            $.post("menusContent", {sessionId: s1, key:s2}, function(data){
                var v = JSON.parse(data);
                $("#contentMenu").html("");
                var isfirst=true;
                if(v.error!="0" ){
                    if(v.error=="empty"){
                        $("#contentMenu").append("List of menus is empty");
                        loadContend("Error", "pages/dashboard/error.jsp");
                    }else{
                        for(i in v){
                            menu= v[i];
                            if (menu.ispageorurl=="1") {
                                $("#contentMenu").append("<a href=\"#"+menu.name+"\" onclick=\"loadContend('"+menu.title+"','"+menu.page+"')\" >"+menu.name+"</a><br>");
                                if(isfirst){
                                    loadContend(menu.title, menu.page);
                                    isfirst=false;
                                }
                            }else{
                                $("#contentMenu").append("<a href=\""+menu.page+"\" target=\"_blank\">"+menu.name+"<a><br>");
                            }
                        }
                    }
                }
                else{
                    $("#contentMenu").append("Error. No loads menus");
                    loadContend("Error", "pages/dashboard/error.html");
                }
            });
        }
    </script>
</html>
