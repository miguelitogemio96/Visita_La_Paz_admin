<?php 
session_start();
require 'admin/config.php';
require 'funciones.php';

// VERIFICAR SI SE ESTÁ EN SESIÓN 
verificar_sesion();


// VERIFICAR LA CONEXION A LA BASE DE DATOS
$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: error.php');
}

// EL USUARIO ESTA HABILITADO Y ES GERENCIAL?
verificar_usuario_gerencial($conexion);

// DAR TITULO A LA PAGINA 
if (isset($_GET['t'])){$titulo=$_GET['t'];}else{$titulo="Inicio";}


require 'views/gerencial.view.php';
?>