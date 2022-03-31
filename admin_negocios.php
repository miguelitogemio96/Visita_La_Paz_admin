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

// ACTUALIZACIONES DE LOS NEGOCIOS
if (isset($_POST['estado'])){
    cambiar_estado_negocio($_POST['id_negocio'], $conexion);
}elseif (isset($_POST['eliminar'])) {
    eliminar_negocio($_POST['id_negocio'], $conexion);
}

// OBTENER LISTADO DE LOS Negocios 
$negocios = obtener_negocios($conexion);
// print_r($negocios);

// DAR TITULO A LA PAGINA 
$titulo = 'Administrar Negocios';

require 'views/admin_negocios.view.php';
?>