<div class="">
    <div id="navbar"></div>
    <div class="col-sm-2 no-print" id="menu"></div>
    <div class="col-sm-10" id="contenido"></div>
    <div class="col-sm-12 footerDashboard" id="footer"></div>
</div>
    <script>        
        function load(param){
            var q= "<%=q2%>";
            var s1= "<%=sessionId%>";
            var s2= "<%=key%>";
            $.post("pages/dashboard/navbar.php?"+q, {sessionId: s1, key:s2}, function(data){
                $("#navbar").html(data);
            });
            $( function() {
                $.post("pages/dashboard/menu.php?"+q, {sessionId: s1, key:s2}, function(data){
                    $("#menu").html(data);
                });
            } );
            $( function() {
                $.post("pages/dashboard/contend.php?"+q, {sessionId: s1, key:s2}, function(data){
                    $("#contenido").html(data);
                });
            } );
            $.post("pages/dashboard/footer.php?"+q, {sessionId: s1, key:s2}, function(data){
                $("#footer").html(data);
            });
        }
        function loadTwo(){
            var isSession="isSession";
            $.post("loginApp",{param:isSession}, function(data){
                var v = JSON.parse(data);
                var idSession = v.isSession;
                if(idSession=="" || idSession =="null" || idSession==undefined){
                    $.post("login.jsp", {}, function(data){
                        $("#contend").html(data);
                    });
                }
                else{
                    loadMenus();
                }
            });
            
        }
        function search(data){
            try{
                var v = JSON.parse(data);
                setTitleContend("Resultados de busqueda para \"<b>"+v.q+"</b>\"");
                setContendToMenu("<a href=\"?q="+v.q+"&search=1\" >Busqueda avanzada</a>");
                if(v.number=="0"){
                    setContendToContend("<h4>No se han encontrado resultado para <b>\""+v.q+"\"</b>.<h4>")
                }else{

                }    
            }catch(e){
                load("");
            }
            
        }
        load("");
        
    </script>
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
</html>
