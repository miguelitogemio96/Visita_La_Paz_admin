<?php 


require 'admin/config.php';
require 'funciones.php';

// VERIFICAR LA CONEXION A LA BASE DE DATOS
$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: error.php');
}

// DAR TITULO A LA PAGINA 
if (isset($_GET['t'])){$titulo=$_GET['t'];}else{$titulo="Olvide Contraseña";}



require 'views/olvide.view.php';
?>