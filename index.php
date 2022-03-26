<?php 
// INSTANCIAMOS SESION
session_start();

require 'admin/config.php';
require 'funciones.php';



// VERIFICAR LA CONEXION A LA BASE DE DATOS
$conexion = conexion($bd_config);
if (!$conexion) {header('Location: error.php');}

// VERIFICAR SI SE ESTÁ EN SESIÓN 
if (!isset($_SESSION['usuario'])){
    header("Location:login.php");
}else{
    // OBTENEMOS LOS DATOS DEL USUARIO
    $usuario = $_SESSION['usuario'];
    $datos_usuario = verificar_username($usuario, $conexion);

    // VERIFICAMOS SI EL USUARIO ESTA HABILITADO
    if ($datos_usuario['estado'] == 1){
        // SI EL USUARIO ESTA HABILITADO, LO REDIRIGIMOS A LA PAGINA GERENCIAL O ADMIN
        $tipo_usuario = $datos_usuario['tipo_usuario'];
        if ( $tipo_usuario == 'a'){
            header('Location:admin.php');
        } elseif ($tipo_usuario == 'g'){
            header('Location:gerencial.php');
        } else {
            header('Location:cerrar.php');
        }
    }elseif ($datos_usuario['estado'] == 0){
        // SI EL USUARIO NO ESTA HABILITADO, LO REDIRIGIMOS A MENSAJE... 
        header('Location:mensaje.php');
    }else{
        header('Location:error.php');
    }
}

require 'views/index.view.php';
?>