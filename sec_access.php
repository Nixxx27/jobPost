<?php

if (session_id() == '' ) {
    session_start();
    

    if (isset($_SESSION['successfull_login']) && $_SESSION['successfull_login'] == true) {
		$global_username 		=	trim($_SESSION['jobPortal_userName']);
	}else{
  		header("location:pleaselogin.php");
	}
}/* if session start */
    
