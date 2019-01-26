<?php  
    session_start();
    $GLOBALS['api'] = "http://localhost/api1.virtualstore/index.php/api/1.0/";
    function login($username, $password){
        //Agregar validaciones
        $cc = curl_init(); 
        curl_setopt($cc, CURLOPT_URL, $GLOBALS['api']."login/".$username."/".$password); 
        curl_setopt($cc, CURLOPT_HEADER, 0);
        curl_setopt($cc, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($cc, CURLOPT_POST , true); 
        $response =  curl_exec($cc);
        curl_close($cc);
        $response = json_decode($response);
        if ($response->response){
            $_SESSION['user'] = $response->data->usuario->user;
            $_SESSION['username'] = $response->data->usuario->Name;
            header('Location: index.php');
        }
        else{
            $_SESSION['user'] = null;
            header('Location: login.php?msglog='.$response->msg);
        }
    }
    function logout(){
        $cc = curl_init(); 
        curl_setopt($cc, CURLOPT_URL, $GLOBALS['api']."logout"); 
        curl_setopt($cc, CURLOPT_HEADER, 0);
        curl_setopt($cc, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($cc, CURLOPT_POST , true); 
        $response =  curl_exec($cc);
        curl_close($cc);
        $response = json_decode($response);
        if ($response->response){
            header('Location: index.php');
        }
        else{
            header('Location: login.php?msglog='.$response->msg);
        }
    }

    if(!isset($_GET['action']) && $_GET['action']!="execute"){
        login("denegado", "denegado");
    }
    if(isset($_GET['logout'])){
        $_SESSION['user'] = null;
        logout();
        header('Location: index.php');
    }
    if(isset($_GET['login']) && isset($_POST['user']) && isset($_POST['pass'])){
        login($_POST['user'], $_POST['pass']);
    }
    
