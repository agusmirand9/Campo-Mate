<?php
$productos = Producto::obtenerTodos();
$categorias = Producto::obtenerCategorias();

$categoriaActiva = $_GET['categoria'] ?? null;

if ($categoriaActiva) {
    $productos = Producto::filtrarPorCategoria($categoriaActiva);
}
?>


<div class="seccion-header">
    <h1>Nuestra Tienda</h1>
    <p>Encontrá todo lo que necesitás para tu mate ideal</p>

</div>


<section class="seccion">
    <div class="contenedor">

        <nav class="categorias-pills">

            <a href="index.php?seccion=tienda" class="pill <?php echo !$categoriaActiva ? 'pill-activa' : ''; ?>">Todos</a>
            
            <?php foreach ($categorias as $cat): ?>
                <a href="index.php?seccion=tienda&categoria=<?php echo $cat; ?>" 
                   class="pill <?php echo $categoriaActiva === $cat ? 'pill-activa' : ''; ?>">
                    <?php echo ucfirst($cat); ?>
                </a>
            <?php endforeach; ?>
        </nav>

        <div class="productos-grid">
            
            <?php foreach($productos as $producto): ?>
            
                <article class="card-producto">
                    <img src="<?php echo $producto->getImagenSrc(); ?>" alt="<?php echo $producto->getNombre(); ?>">
                
                <div class="card-cuerpo">
                    <span class="card-categoria"><?php echo $producto->getCategoria();?></span>
                    <h3 class="card-nombre"><?php echo $producto->getNombre(); ?></h3>
                    <p class="card-descripcion"><?php echo $producto->getDescripcion(); ?></p>
                    <p class="precio"><?php echo $producto->getPrecioFormateado(); ?></p>
                    <p class="card-stock">
                        <?php if($producto->enStock()): ?>
                            <span class="stock-si">En stock</span>
                        <?php else: ?>
                            <span class="stock-no">Sin stock</span>
                        <?php endif; ?>
                    </p>
            
                    <a href="index.php?seccion=detalle&id=<?php echo $producto->getId(); ?>" class="btn-card">Ver detalle</a>
            
                </div>
                </article>
            <?php endforeach; ?>

        </div>

    </div>


</section>



