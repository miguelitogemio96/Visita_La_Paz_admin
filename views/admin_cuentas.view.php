<?php require 'header.php'; ?>
<?php require 'sidebar_admin.php'; ?>
<?php require 'barra.php'; ?>
<div class="contenido">
    <h2 class="contenido__nombre_pagina"><?php echo $titulo; ?></h2>
    <div class="contenedor-sm">
        <ul class="cuenta__listado">  
            <?php foreach($cuentas as $cuenta):?>          
                <li class="cuenta">
                    <p class="cuenta__texto"><?php echo $cuenta['username']; ?></p>
                    <div class="cuenta__opciones">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                            <input type="hidden" name = "id_usuario" id = "id_usuario" value="<?php echo $cuenta['id_usuario']; ?>">
                            <button  id="estado" name="estado" class="cuenta__opciones--boton cuenta__opciones--<?php echo ($cuenta['estado'] == 1) ? 'habilitado' : 'pendiente'; ?>">
                                <?php echo ($cuenta['estado'] == 1) ? 'Habilitado' : 'Pendiente'; ?>
                            </button>                    
                        </form>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                            <input type="hidden" name = "id_usuario" id = "id_usuario" value="<?php echo $cuenta['id_usuario']; ?>">
                            <button id="eliminar" name ="eliminar" class="cuenta__opciones--boton cuenta__opciones--eliminar">Eliminar</button>                                        
                        </form>
                    </div>
                </li>    
            <?php endforeach;?>          
        </ul>
    </div>
</div>

<?php require 'footer.php'; ?>
