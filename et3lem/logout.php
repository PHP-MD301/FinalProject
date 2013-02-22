<?php
ob_start();session_start();
include_once('fucntions.php');

session_destroy();
redirect_to_after(0,$_SERVER['HTTP_REFERER']);
?>
