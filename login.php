<?php 
session_start();

require 'admin/config.php';
require 'funciones.php';

// HAY UNA SESIÓN ACTIVA? ENVIAR AL iNDEX
verificar_sesion_index();

// VERIFICAR LA CONEXION A LA BASE DE DATOS
$conexion = conexion($bd_config);
if (!$conexion) {header('Location: error.php');}

// VERIFICAMOS LOS DATOS DEL LOGIN 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = strtolower($_POST['usuario']);
    $contraseña = $_POST['contraseña'];

    // VERIFICAR CAMPOS VACIOS
    $errores = '';
    if (empty($usuario) or empty($contraseña)) {
        $errores .= '<li>Por favor, rellena todos los datos correctamente.</li>';
    }else{
        // VERIFICAR SI EL USUARIO Y LA CONTRASENA COINCIDEN
        // $contraseña = hash('sha512', $contraseña);
        if ((verificar_username_pass($usuario, $contraseña, $conexion) == false)){
            $errores .= '<li>El nombre de usuario o la contraseña son incorrectos.</li>';
        }else{
            $_SESSION['usuario'] = $usuario;
            header('Location:index.php');
        }
    }
}

// DAR TITULO A LA PAGINA 
if (isset($_GET['t'])){$titulo=$_GET['t'];}else{$titulo="Iniciar Sesion";}

require 'views/login.view.php';
?>
<!-- admin:
miguelito96 
123456

gerencial habilitado:
mike 
1234

gerencial no habilitado:
joselito
123 -->

