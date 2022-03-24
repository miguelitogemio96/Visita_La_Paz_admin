<?php require 'header.php'; ?>
    <div class="contenedor">
        <a href="index.php">
            <h1 class="infoadmin">InfoAdmin</h1>
        </a>
        <p class="tagline">Crea y Administra tu Negocio</p>
        <div class="contenedor-sm">
            <p class="descripcion_pagina">Crea tu cuenta en InfoAdmin</p>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" class="formulario" method="POST">
                <!-- <div class="campo_crear">
                    <label class="campo__label" for="nombre">Nombres</label>
                    <input class="campo__input" id="nombre" type="text" placeholder="Tu Nombre" name="nombre">
                </div>
                <div class="campo_crear">
                    <label class="campo__label" for="apellido">Apellidos</label>
                    <input class="campo__input" id="apellido" type="text" placeholder="Tu Apellido apellido" name="apellido">
                </div>-->
                <div class="campo_crear"> 
                    <label class="campo__label" for="usuario">Usuario</label>
                    <input class="campo__input" id="usuario" type="text" placeholder="Tu Username" name="usuario">
                </div>
                <!-- <div class="campo_crear">
                    <label class="campo__label" for="email">Email</label>
                    <input class="campo__input" id="email" type="email" placeholder="Tu Email" name="email">
                </div>
                <div class="campo_crear">
                    <label class="campo__label" for="fec_nac">Fecha Nacimiento</label>
                    <input class="campo__input" id="fec_nac" type="date" placeholder="Fecha de Tu Nacimiento" name="fec_nac">
                </div> -->
                <div class="campo_crear">
                    <label class="campo__label" for="contraseña">Contraseña</label>
                    <input class="campo__input" id="contraseña" type="password" placeholder="Tu Contraseña" name="contraseña">
                </div>
                <div class="campo_crear">
                    <label class="campo__label" for="contraseña2">Repite Contraseña</label>
                    <input class="campo__input" id="contraseña2" type="password" placeholder="Repite tu Contraseña" name="contraseña2">
                </div>
                <input type="hidden" id="mensaje" name="mensaje" value="Estamos verificando tus datos, Pronto tu cuenta sera habilitada!">
                <input type="submit" class="boton" value="Crear Cuenta">

                <?php if (!empty($errores)): ?>
                    <div >
                        <ul class="error">
                            <?php echo $errores; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </form>
            <div class="acciones">
                <a class="acciones__enlace" href="login.php">Ya tienes una cuenta? Iniciar Sesion</a>
                <a class="acciones__enlace" href="olvide.php">Olvidaste tu Contraseña?</a>
            </div>
        </div>
        <!-- .contenedor-sm  -->
    </div>
    <!-- .contenedor  -->
</body>
</html>