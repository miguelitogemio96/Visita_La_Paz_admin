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

// ACTUALIZACIONES DE LAS CUENTAS 
if (isset($_POST['estado'])){
    cambiar_estado_cuenta($_POST['id_usuario'], $conexion);
}elseif (isset($_POST['eliminar'])) {
    eliminar_cuentas($_POST['id_usuario'], $conexion);
}


// OBTENER EL LISTADO DE CUENTAS DE LA BASE DE DATOS
$cuentas = obtener_cuentas_gerenciales($conexion);
// print_r($cuentas);


// DAR TITULO A LA PAGINA 
$titulo = 'Administrar Cuentas';

require 'views/admin_cuentas.view.php';
?>