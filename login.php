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
    // $usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
    $usuario = filter_string_polyfill($_POST['usuario']);

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
$titulo = 'Iniciar Sesion';

require 'views/login.view.php';
?>
<!-- admin:
miguelito 
123456

gerencial habilitado:
mike 
1234

gerencial no habilitado:
joselito
123 -->

