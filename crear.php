<?php 
session_start();
require 'admin/config.php';
require 'funciones.php';

if (isset($_SESSION['usuario'])){
    header("Location:index.php");
}

// VERIFICAR LA CONEXION A LA BASE DE DATOS
$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: error.php');
}
// RECIBIR DATOS DE CREACION DE CUENTA
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = strtolower($_POST['usuario']);
    $contraseña = $_POST['contraseña'];
    $contraseña2 = $_POST['contraseña2'];
    $mensaje = $_POST['mensaje'];

    // VERIFICAR CAMPOS VACIOS
    $errores = '';
    if (empty($usuario) or empty($contraseña) or empty($contraseña2)) {
        $errores .= '<li>Por favor, rellena todos los datos correctamente.</li>';
    }else{
        // VERIFICAR SI EL USUARIO YA EXISTE
        if (verificar_username($usuario, $conexion) != false){
            $errores .= '<li>El nombre de usuario ya existe. </li>';
        }
        
        if ($contraseña != $contraseña2) {
            $errores .= '<li>Las contraseñas no son iguales.</li>';
        }else{
            $contraseña = hash('sha512', $contraseña);
        }
    }
    if ($errores == '') {
        insertar_usuario($conexion, $usuario, $contraseña);
        header('Location:mensaje.php');
    }

    // echo "$usuario  .$contraseña";
}


// DAR TITULO A LA PAGINA 
if (isset($_GET['t'])){$titulo=$_GET['t'];}else{$titulo="Crear Cuenta";}




require 'views/crear.view.php';
?>