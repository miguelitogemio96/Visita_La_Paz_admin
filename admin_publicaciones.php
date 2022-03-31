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

// ACTUALIZACIONES DE LAS PUBLICACIONES
if (isset($_POST['estado'])){
    cambiar_estado_publicacion($_POST['id_pub'], $conexion);
}elseif (isset($_POST['eliminar'])) {
    eliminar_publicacion($_POST['id_pub'], $conexion);
}

// OBTENER LISTADO DE LOS Negocios 
$posts = obtener_publicaciones($conexion);
// print_r($publicaciones);


// DAR TITULO A LA PAGINA 
$titulo = 'Administrar POSTS';

require 'views/admin_publicaciones.view.php';
?>