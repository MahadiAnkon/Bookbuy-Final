<?php

@include 'config_pge.php';

session_start();
session_unset();
session_destroy();

header('location:index.php');

?>
