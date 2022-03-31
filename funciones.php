<?php

// VERIFICAR SI EXISTE UNA SESION, CASO CONTRARIO ENVIAR A LOGIN
function verificar_sesion(){
    if (!isset($_SESSION['usuario'])){
        header("Location:login.php");
    }
}

// VERIFICAR SI EXTISTE UNS SESION, SI ES ASI, ENVIAR AL INDEX 
function verificar_sesion_index(){
    if (isset($_SESSION['usuario'])){
        header("Location:index.php");
    }
}

// VERIFICAR EL USUARIO SEA ADMIN Y TENGA CUENTA HABILITADA
function verificar_usuario_admin($conexion){
    $usuario = $_SESSION['usuario'];
    $datos_usuario = verificar_username($usuario, $conexion);
    if (!($datos_usuario['estado'] == 1 && $datos_usuario['tipo_usuario'] == 'a')){
        header('Location:index.php');        
    }
}

// VERIFICAR EL USUARIO SEA GERENCIAL Y TENGA CUENTA HABILITADA
function verificar_usuario_gerencial($conexion){
    $usuario = $_SESSION['usuario'];
    $datos_usuario = verificar_username($usuario, $conexion);
    if (!($datos_usuario['estado'] == 1 && $datos_usuario['tipo_usuario'] == 'g')){
        header('Location:index.php');        
    }
}


function conexion($bd_config){
    try {
        $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
        return $conexion;    
    }catch (PDOException $e){
        return false;
    }
} 


function verificar_username($usuario, $conexion){
    $sentencia = $conexion->prepare("SELECT * FROM usuarios WHERE username = :usuario LIMIT 1");
    $sentencia->execute(array(':usuario' => $usuario));
    $resultado = $sentencia->fetch();
    return $resultado;
}

function verificar_username_pass($usuario, $password, $conexion){
    $sentencia = $conexion->prepare("SELECT * FROM usuarios WHERE username = :usuario AND password = :password LIMIT 1");
    $sentencia->execute(array(':usuario' => $usuario, ':password' => $password));
    $resultado = $sentencia->fetch();
    return $resultado;
}

function insertar_usuario($conexion, $usuario, $contraseña) {
    $sentencia = $conexion->prepare("INSERT INTO usuarios (id_usuario, id_persona, username, password, correo, tipo_usuario, estado) VALUES (NULL, 10, :usuario, :pass, '@hotmail.com', 'g', 0)");
    $sentencia->execute(array(':usuario' => $usuario, ':pass' => $contraseña));
}

function filter_string_polyfill(string $string): string
{
    $str = preg_replace('/\x00|<[^>]*>?/', '', $string);
    return str_replace(["'", '"'], ['&#39;', '&#34;'], $str);
}

function obtener_cuentas_gerenciales($conexion) {
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS id_usuario, username, correo, estado FROM usuarios WHERE tipo_usuario != 'a' AND tipo_usuario = 'g' ORDER BY estado");
    $sentencia->execute();
    return $sentencia->fetchAll();  
}

function eliminar_cuentas($id_usuario, $conexion){
    $sentencia = $conexion->prepare("DELETE FROM usuarios WHERE id_usuario = :usuario");
    $sentencia->execute(array(':usuario' => $id_usuario));
}

function cambiar_estado_cuenta($id_usuario, $conexion){
    $sentencia = $conexion->prepare("SELECT * FROM usuarios WHERE id_usuario = :usuario LIMIT 1");
    $sentencia->execute(array(':usuario' => $id_usuario));
    $resultado = $sentencia->fetch();
    $estado = $resultado['estado'];
    $nuevo_estado = ($estado == '0') ? '1' : '0';
    $sentencia2 = $conexion->prepare("UPDATE usuarios SET estado = $nuevo_estado WHERE id_usuario= :usuario");
    $sentencia2->execute(array(':usuario' => $resultado['id_usuario']));
}

function obtener_negocios($conexion) {
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM negocios ORDER BY nombre");
    $sentencia->execute();
    return $sentencia->fetchAll();  
}

function eliminar_negocio($id_negocio, $conexion){
    $sentencia = $conexion->prepare("DELETE FROM negocios WHERE id_negocio = :negocio");
    $sentencia->execute(array(':negocio' => $id_negocio));
}

function cambiar_estado_negocio($id_negocio, $conexion){
    $sentencia = $conexion->prepare("SELECT * FROM negocios WHERE id_negocio = :negocio LIMIT 1");
    $sentencia->execute(array(':negocio' => $id_negocio));
    $resultado = $sentencia->fetch();
    $estado = $resultado['estado'];
    $nuevo_estado = ($estado == '0') ? '1' : '0';
    $sentencia2 = $conexion->prepare("UPDATE negocios SET estado = $nuevo_estado WHERE id_negocio= :negocio");
    $sentencia2->execute(array(':negocio' => $resultado['id_negocio']));
}



function obtener_publicaciones($conexion) {
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM publicaciones ORDER BY titulo");
    $sentencia->execute();
    return $sentencia->fetchAll();  
}

function eliminar_publicacion($id_pub, $conexion){
    $sentencia = $conexion->prepare("DELETE FROM publicaciones WHERE id_pub = :pub");
    $sentencia->execute(array(':pub' => $id_pub)  );
}

function cambiar_estado_publicacion($id_pub, $conexion){
    $sentencia = $conexion->prepare("SELECT * FROM publicaciones WHERE id_pub = :pub LIMIT 1");
    $sentencia->execute(array(':pub' => $id_pub)  );
    $resultado = $sentencia->fetch();
    $estado = $resultado['estado'];
    $nuevo_estado = ($estado == '0') ? '1' : '0';
    $sentencia2 = $conexion->prepare("UPDATE publicaciones SET estado = $nuevo_estado WHERE id_pub= :pub");
    $sentencia2->execute(array(':pub' => $resultado['id_pub']));
}

function obtener_productos($conexion) {
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM productos_servicios WHERE tipo = 'p' ORDER BY nombre");
    $sentencia->execute();
    return $sentencia->fetchAll();  
}
function obtener_servicios($conexion) {
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM productos_servicios WHERE tipo = 's' ORDER BY nombre");
    $sentencia->execute();
    return $sentencia->fetchAll();  
}

function eliminar_producto_servicio($id_prod_ser, $conexion){
    $sentencia = $conexion->prepare("DELETE FROM productos_servicios WHERE id_prod_ser = :prod_ser");
    $sentencia->execute(array(':prod_ser' => $id_prod_ser));
}

// function cambiar_estado_producto_servicio($id_prod_ser, $conexion){
//     $sentencia = $conexion->prepare("SELECT * FROM productos_servicios WHERE id_prod_ser = :prod_ser LIMIT 1");
//     $sentencia->execute(array(':prod_ser' => $id_prod_ser));
//     $resultado = $sentencia->fetch();
//     $estado = $resultado['estado'];
//     $nuevo_estado = ($estado == '0') ? '1' : '0';
//     $sentencia2 = $conexion->prepare("UPDATE productos_servicios SET estado = $nuevo_estado WHERE id_prod_ser= :prod_ser");
//     $sentencia2->execute(array(':prod_ser' => $resultado['id_prod_ser']));
// }



?>