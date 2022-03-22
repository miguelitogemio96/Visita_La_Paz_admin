<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo RUTA; ?>css/normalize.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo RUTA; ?>css/style.css">   
    <title>Visita La Paz-ADMIN</title>
</head>
<body>
    <div class="contenedor login">
        <h1 class="infoadmin">InfoAdmin</h1>
        <p class="tagline">Crea y Administra tu Negocio</p>
        <div class="contenedor-sm">
            <p class="descripcion_pagina">Iniciar Sesion</p>
            <form action="#" class="formulario" method="POST">
                <div class="campo">
                    <label class="campo__label" for="usuario">Usuario</label>
                    <input class="campo__input" id="usuario" type="email" placeholder="Tu Username o Email" name="usuario">
                </div>
                <div class="campo">
                    <label class="campo__label" for="contraseña">Contraseña</label>
                    <input class="campo__input" id="contraseña" type="password" placeholder="Tu Contraseña" name="contraseña">

                </div>
                <input type="submit" class="boton" value="Iniciar Sesion">
            </form>
            <div class="acciones">
                <a class="acciones__enlace" href="#">Aun no tienes una cuenta? obtener una</a>
                <a class="acciones__enlace" href="#">Olvidaste tu Contraseña?</a>
            </div>
        </div>
        <!-- .contenedor-sm  -->
    </div>
    <!-- .contenedor  -->
</body>
</html>