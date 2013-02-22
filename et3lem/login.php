<?php
ob_start();session_start();
include_once('fucntions.php');

draw_login_form_save($_POST['login_username'],$_POST['login_password']);

?>
