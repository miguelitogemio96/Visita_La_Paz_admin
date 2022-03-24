<?php 


require 'admin/config.php';
require 'funciones.php';

// VERIFICAR LA CONEXION A LA BASE DE DATOS
$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: error.php');
}

$mensaje = $_POST['mensaje'];
// echo $mensaje;

// DAR TITULO A LA PAGINA 
if (isset($_GET['t'])){$titulo=$_GET['t'];}else{$titulo="Mensaje";}


require 'views/mensaje.view.php';
?>