<?php 
session_start();

require 'admin/config.php';
require 'funciones.php';

// VERIFICAR LA CONEXION A LA BASE DE DATOS
$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: error.php');
}

// DAR TITULO A LA PAGINA 
$titulo = 'Recuperar Password';

require 'views/olvide.view.php';
?>