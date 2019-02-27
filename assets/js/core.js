function addLoading(){
    $("#content").prepend("<div class=\" text-center\" role=\"alert\" style=\" position: fixed; \"><img src=\"pages/images/loading_spinner.gif\" height=\"32\" width=\"32\">  Loading content, please wait ....</div>");   
}
function addError(){
    $("#content").prepend("<div class=\"alert alert-danger alert-dismissibl text-center\" role=\"alert\" style=\"  \"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button> Error. No es posible cargar el contenido</div>");   
}
function setTitleContend(title){
    $("#titleContend").html(title);
}
function setContendToContend(html){
    $("#content").html(html);   
}
function loadContend(titleName, url){
    addLoading();
    $("#iconandiazhercontend").html("");
    setTitleContend("<img src=\"assets/images/loading_spinner.gif\" height=\"15\" width=\"15\"> "+titleName);
    try{
        var s1= "<%=sessionId%>";
        var s2= "<%=key%>";
        $.post(""+url, {sessionId: s1, key:s2}, function(data){
            setTitleContend(titleName);
            $("#iconandiazhercontend").html("<span class=\"glyphicon glyphicon-th\" aria-hidden=\"true\"></span>");
            setContendToContend(data);
        });
    }catch(err){
        setContendToContend("I DO NOT LOAD THE CONTEND: " +err);
    }
}