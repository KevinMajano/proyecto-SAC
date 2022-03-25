<?php
session_start();
if($_SESSION['access_token'])
{
    header("Location: ./public/main/");
}else{
    header("Location: ./public/login/");
}
?>