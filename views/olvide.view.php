<?php require 'header.php'; ?>
    <div class="contenedor">
        <a href="index.php">
            <h1 class="infoadmin">InfoAdmin</h1>
        </a>
        <p class="tagline">Crea y Administra tu Negocio</p>
        <div class="contenedor-sm">
            <p class="descripcion_pagina">Enviar Contraseña</p>
            <form action="mensaje.php" class="formulario" method="POST">
                <div class="campo">
                    <label class="campo__label" for="usuario">Usuario</label>
                    <input class="campo__input" id="usuario" type="text" placeholder="Tu Username o Email" name="usuario">
                    <input type="hidden" id="mensaje" name="mensaje" value="Se han enviado los pasos para restablecer tu contraseña a tu Email.">
                </div>
                <input type="submit" class="boton" value="Enviar a Email">
            </form>
            <div class="acciones">
                <a class="acciones__enlace" href="login.php">Ya tienes una cuenta? Iniciar Sesion</a>
                <a class="acciones__enlace" href="crear.php">Aun no tienes una cuenta? obtener una</a>
            </div>
        </div>
        <!-- .contenedor-sm  -->
    </div>
    <!-- .contenedor  -->
</body>
</html>