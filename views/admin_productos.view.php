<?php require 'header.php'; ?>
<?php require 'sidebar_admin.php'; ?>
<?php require 'barra.php'; ?>
<div class="contenido">
    <h2 class="contenido__nombre_pagina"><?php echo $titulo; ?></h2>
    <div class="contenedor-sm">
        <ul class="cuenta__listado">  
            <?php foreach($productos as $producto):?>          
                <li class="cuenta">
                    <p class="cuenta__texto"><?php echo $producto['nombre']; ?></p>
                    <div class="cuenta__opciones">
                        <!-- <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                            <input type="hidden" name="id_prod_ser" id = "id_prod_ser" value="<?php echo $producto['id_prod_ser']; ?>">
                            <button  id="estado" name="estado" class="cuenta__opciones--boton cuenta__opciones--<?php echo ($producto['estado'] == 1) ? 'habilitado' : 'pendiente'; ?>">
                                <?php echo ($producto['estado'] == 1) ? 'Habilitado' : 'Pendiente'; ?>
                            </button>                    
                        </form> -->
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                            <input type="hidden" name = "id_prod_ser" id = "id_prod_ser" value="<?php echo $post['id_prod_ser']; ?>">
                            <button id="eliminar" name ="eliminar" class="cuenta__opciones--boton cuenta__opciones--eliminar">Eliminar</button>                                        
                        </form>
                    </div>
                </li>    
            <?php endforeach;?>          
        </ul>
    </div>
</div>

<?php require 'footer.php'; ?>
