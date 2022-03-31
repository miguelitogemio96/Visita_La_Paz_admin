<?php 
session_start();
require 'admin/config.php';
require 'funciones.php';

// VERIFICAR SI SE ESTÁ EN SESIÓN 
verificar_sesion();


// VERIFICAR LA CONEXION A LA BASE DE DATOS
$conexion = conexion($bd_config);
if (!$conexion) {    header('Location: error.php');}

// EL USUARIO ESTA HABILITADO Y ES ADMIN?
verificar_usuario_admin($conexion);

// HABILITAR O ELIMINAR PRODUCTOS
if (isset($_POST['eliminar'])) {
    eliminar_producto_servicio($_POST['id_prod_ser'], $conexion);
}

// OBTENER LISTADO DE LOS Negocios 
$servicios = obtener_servicios($conexion);
// print_r($servicios);

// DAR TITULO A LA PAGINA 
$titulo = 'Administrar Servicios';

require 'views/admin_Servicios.view.php';
?>