<?php require 'header.php'; ?>
    <div class="contenedor">
        <a href="index.php">
            <h1 class="infoadmin">InfoAdmin</h1>
        </a>
        <p class="tagline">Crea y Administra tu Negocio</p>
        <div class="contenedor-sm">
            <p class="descripcion_pagina">Datos Enviados</p>
            <form action="#" class="formulario" method="POST">
                <p class="mensaje"><?php echo $mensaje;?></p>
            </form>
            <div class="acciones">
                <a class="acciones__enlace" href="login.php">Volver al Login</a>
            </div>
        </div>
        <!-- .contenedor-sm  -->
    </div>
    <!-- .contenedor  -->
</body>
</html>