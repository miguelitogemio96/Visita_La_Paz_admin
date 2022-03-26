<?php 
session_start();

// TERMINAMOS LA SESION 
session_destroy();

// ELIMINAMOS LOS DATOS GLOBALES DE LA CUENTA 
// clear all of the global session data...
$_SESSION = array();

// REDIRIGIMOS A LA PAGINA DE LOGIN 
header('Location:login.php')
?>