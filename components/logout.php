<?php
session_start();

session_unset();
session_destroy();

header('location:/FUTSAL1/index.php');
exit;
?>