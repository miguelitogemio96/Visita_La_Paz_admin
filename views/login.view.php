<?php require 'header.php'; ?>
    <div class="contenedor">
        <a href="index.php">
            <h1 class="infoadmin">InfoAdmin</h1>
        </a>
        <p class="tagline">Crea y Administra tu Negocio</p>
        <div class="contenedor-sm">
            <p class="descripcion_pagina">Iniciar Sesion</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="formulario" method="POST">
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
                <a class="acciones__enlace" href="crear.php">Aun no tienes una cuenta? obtener una</a>
                <a class="acciones__enlace" href="olvide.php">Olvidaste tu Contraseña?</a>
            </div>
        </div>
        <!-- .contenedor-sm  -->
    </div>
    <!-- .contenedor  -->
</body>
</html>