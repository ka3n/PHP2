<?php 

include 'includes/config.inc.php';
unset($_SESSION['username']);
header('location: login.php');
