<?php
require_once('DBconnect.php');


session_start();
session_destroy();
header('Location: home.php');
?>