<?php
 session_start();	
session_destroy();
unset($_SESSION['name']);
unset($_SESSION['user']);
echo '<script language="javascript">';
echo 'alert("You have successfully logged out")';
echo '</script>';
 header("Location: http://todo.jyc.co.in/");
?> 