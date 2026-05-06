<?php 
$categoria = $_GET['categoria'] ?? '';

if (empty($categoria)) {
    header ('Location: index.php?seccion=tienda');
    exit;
}

$productos = Producto ::filtrarPorCategoria($categoria);
$nombreCategoria = ucfirst($categoria);


?>


<div class="seccion-header">
    <h1>Categoría: <?php echo $nombreCategoria;?> </h1>
    <p><?php echo count($productos); ?> Productos encontrados</p>

</div>

<section class="seccion">
    <div class="contenedor">

        <?php if (empty($productos)): ?>
        <div class="mensaje-estado">
            <h2>No hay productos en esta categoría</h2>
            <p>Probá con otra categoría o volve atras.</p>
            <a href="index.php?seccion=tienda" class="btn-volver">Ver toda la tienda</a>
        </div>

        <?php else: ?>

        <div class="productos-grid">
            <?php foreach ($productos as $producto): ?>

            <article class="card-producto">

                <img src="<?php echo $producto->getImagenSrc(); ?>" alt="<?php echo $producto->getNombre(); ?>">

                <div class="card-cuerpo">
                    <span class="card-categoria"><?php echo $producto->getCategoria(); ?></span>
                    <h3 class="card-nombre"><?php echo $producto->getNombre(); ?></h3>
                    <p class="card-descripcion"><?php echo $producto->getDescripcion(); ?></p>
                    <p class="card-precio"><?php echo $producto->getPrecioFormateado(); ?></p>

                    <p class="card-stock">
                        <?php if ($producto->enStock()): ?>
                            <span class="stock-si">En Stock</span>
                        <?php else: ?>
                            <span class="stock-no">Sin Stock</span>
                        <?php endif; ?>
                    </p>

                    <a href="index.php?seccion=detalle&id=<?php echo $producto->getId(); ?>" class="btn-card">Ver detalle</a>

                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<div class="contenedor" style="padding-bottom: 2rem;">
    <a href="index.php?seccion=tienda" class="btn-volver">Volver a la tienda</a>
</div>