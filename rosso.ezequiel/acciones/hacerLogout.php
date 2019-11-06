<?php 
session_start();

$_SESSION['idDeUsuario'] = NULL;

session_destroy();

header("Location: ../index.php");


