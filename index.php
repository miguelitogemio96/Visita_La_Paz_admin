<?php 
// INSTANCIAMOS SESION
session_start();
require 'admin/config.php';
require 'funciones.php';

// VERIFICAR LA CONEXION A LA BASE DE DATOS
$conexion = conexion($bd_config);
if (!$conexion) {header('Location: error.php');}

//VERIFICAMOS EL INICIO DE SESION 
if (isset($_SESSION['usuario'])){
    header('Location: gerencial.php');
}else{
    header('Location:login.php');
}




require 'views/index.view.php';
?>