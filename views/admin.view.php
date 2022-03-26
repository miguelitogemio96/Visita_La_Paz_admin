<?php require 'header.php'; ?>
<body>
    <div class="dashboard">
        <aside class="sidebar">
            <a href="index.php">
                <h2 class="sidebar__infoadmin">InfoAdmin</h2>
            </a>
            <nav class="sidebar__nav">
                <a href="#" class="sidebar__nav--enlace">Negocios</a>
                <a href="#" class="sidebar__nav--enlace">Cuentas Gerenciales</a>
                <a href="#" class="sidebar__nav--enlace">Publicaciones</a>
                <a href="#" class="sidebar__nav--enlace">Productos-Servicios</a>
                <a href="#" class="sidebar__nav--enlace">Otros</a>
            </nav>
        </aside>

        <div class="principal">
            <div class="barra">
                <p class="barra__texto">Hola: <span class="barra__texto--username"><?php echo 'Miguelito96';?></span></p>
                <a href="cerrar.php" class="barra__boton">Cerrar Sesion</a>
            </div>

        </div>
    </div>
</body>
</html>