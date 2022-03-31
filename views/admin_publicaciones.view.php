<?php require 'header.php'; ?>
<?php require 'sidebar_admin.php'; ?>
<?php require 'barra.php'; ?>
<div class="contenido">
    <h2 class="contenido__nombre_pagina"><?php echo $titulo; ?></h2>
    <div class="contenedor-sm">
        <ul class="cuenta__listado">  
            <?php foreach($posts as $post):?>          
                <li class="cuenta">
                    <p class="cuenta__texto"><?php echo $post['titulo']; ?></p>
                    <div class="cuenta__opciones">
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                            <input type="hidden" name="id_pub" id = "id_pub" value="<?php echo $post['id_pub']; ?>">
                            <button  id="estado" name="estado" class="cuenta__opciones--boton cuenta__opciones--<?php echo ($post['estado'] == 1) ? 'habilitado' : 'pendiente'; ?>">
                                <?php echo ($post['estado'] == 1) ? 'Habilitado' : 'Pendiente'; ?>
                            </button>                    
                        </form>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                            <input type="hidden" name = "id_pub" id = "id_pub" value="<?php echo $post['id_pub']; ?>">
                            <button id="eliminar" name ="eliminar" class="cuenta__opciones--boton cuenta__opciones--eliminar">Eliminar</button>                                        
                        </form>
                    </div>
                </li>    
            <?php endforeach;?>          
        </ul>
    </div>
</div>

<?php require 'footer.php'; ?>
