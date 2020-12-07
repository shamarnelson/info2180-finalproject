<?php 
    if(isset($_COOKIE['email'])): //{
        $current_user = $_COOKIE['email'];
        setcookie('email',$current_user,time()-1000);
    endif ;
    //     echo 'You are now logged out';
    // }else{
    //     echo 'You are already logged out';
    // }
?>