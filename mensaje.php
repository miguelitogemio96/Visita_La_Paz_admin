<?php 

session_start();
require 'admin/config.php';
require 'funciones.php';

// VERIFICAR LA CONEXION A LA BASE DE DATOS
$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: error.php');
}

verificar_sesion();

if (isset($_POST['mensaje'])){
    $mensaje = $_POST['mensaje'];
}else{
    $mensaje = 'Estamos verificando tus datos, Pronto tu cuenta sera habilitada!';
}
// echo $_SESSION['usuario'];

// DAR TITULO A LA PAGINA 
$titulo = 'Mensaje';

require 'views/mensaje.view.php';
?>