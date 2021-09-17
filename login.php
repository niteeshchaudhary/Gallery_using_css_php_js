<?php
session_start();
    $username = "eval";
    $password = "eva";
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        header("Location: album.php");
    }
    else if(isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == false){
       header("Refresh: 0; URL= index.php?ses=invalid");
}

    if(isset($_POST['ID']) && isset($_POST['password'])){
        if($_POST['ID'] == $username && $_POST['password'] == $password){
            $_SESSION['loggedin'] = true;
            header("Location: album.php");
        }
        else{
            header("Refresh: 0; URL= index.php?ses=invalid");
        }
    }
    

?>
