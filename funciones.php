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



// // LIMPIAR LOS DATOS PARA EVITAR INYECTAR CODIGO
// function limpiarDatos($datos) {
//     $datos = trim($datos);
//     $datos = stripslashes($datos);
//     $datos = htmlspecialchars($datos);
//     return $datos;
// }

// // PAGINACION
// function pagina_actual(){
//     return isset($_GET['p']) ? (int)$_GET['p'] : 1;
// }

// // CALCULAR LOS POST-POR PAGINA
// function inicio($post_por_pagina){
//     $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
//     return $inicio;
// }
// // OBTENER LOS PRODUCTOS
// function obtener_post_productos($post_por_pagina, $conexion){
//     $inicio = inicio($post_por_pagina);
//     $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM productos_servicios WHERE tipo = 'p' LIMIT $inicio, $post_por_pagina");
//     $sentencia->execute();
//     return $sentencia->fetchAll();  
// }
// // OBTENER LOS SERVICIOS
// function obtener_post_servicios($post_por_pagina, $conexion){
//     $inicio = inicio($post_por_pagina);
//     $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM productos_servicios WHERE tipo = 's' LIMIT $inicio, $post_por_pagina");
//     $sentencia->execute();
//     return $sentencia->fetchAll();  
// }

// // OBTENER LAS PUBLICACIONES
// function obtener_post_publicaciones($post_por_pagina, $conexion){
//     $inicio = inicio($post_por_pagina);
//     $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM publicaciones LIMIT $inicio, $post_por_pagina");
//     $sentencia->execute();
//     return $sentencia->fetchAll();  
// }

// // OBTENER EL ID Y TIPO DE PRODUCTO DE UNA PUBLICACION
// function obtener_prod_ser($id_prod_ser, $conexion){
//     $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM productos_servicios WHERE id_prod_ser = $id_prod_ser LIMIT 1");
//     $sentencia->execute();
//     $sentencia = $sentencia->fetchAll();
//     return $sentencia[0];
// }
// // OBTENER EL ID Y TIPO DE PRODUCTO DE UNA PUBLICACION (Segunda Forma)
// function obtener_prod_ser_2($id_prod_ser, $conexion){
//     $resultado = $conexion->query("SELECT * FROM productos_servicios WHERE id_prod_ser = $id_prod_ser LIMIT 1");
//     $resultado = $resultado->fetchAll();
//     return ($resultado[0]) ? $resultado[0] : false;
// }

// // OBTENER TIPO DE UN PROD_SER CON EL ID
// function obtener_tipo_prod_ser($id,$conexion){
//     $prod_ser = obtener_prod_ser($id, $conexion);
//     $tipo = $prod_ser['tipo'];
//     return $tipo;
// }

// // OBTENER UN NUMERO ID Y LIMPIAR DE iNYECCION DE CODIGO
// function id_int_prod_ser($id){
//     return (int)limpiarDatos($id);
// }

// // OBTENER NUMERO DE PAGINAS
// function numero_paginas($post_por_pagina, $conexion){
// 	//4.- Calculamos el numero de filas / articulos que nos devuelve nuestra consulta
// 	$total_post = $conexion->prepare('SELECT count(*) AS total FROM `publicaciones`');
// 	$total_post->execute();
// 	$total_post = $total_post->fetch()['total'];

// 	//5. Calculamos el numero de paginas que habra en la paginacion
// 	$numero_paginas = ceil($total_post / $post_por_pagina);
// 	return $numero_paginas;
// }



?>