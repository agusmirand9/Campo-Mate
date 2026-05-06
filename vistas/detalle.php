<?php
$id = isset($_GET['id'])? (int)$_GET['id'] : 0;

$producto = Producto::buscarPorId($id);

if($producto == null){
    header ('Location: index.php?seccion=404');
    exit;
}

?>

<div class="seccion-header">
    <h1><?php echo $producto->getNombre(); ?></h1>
    <p>Categoría:<?php echo $producto->getCategoria(); ?></p>

</div>

<section class="seccion">
    <div class="contenedor">

        <div class="detalle-grid">
            <div class="detalle-imagen">
                <img src="<?php echo $producto->getImagenSrc(); ?>" alt="<?php echo $producto->getNombre(); ?>">

            </div>

            <div class="detalle-info">
                <p class="detalle-categoria"><?php echo ucfirst($producto->getCategoria());?> </p>

                <h1><?php echo $producto->getNombre();?></h1>

                <p class="detalle-descripcion">
                    <?php echo $producto->getDescripcion(); ?>
                </p>

                <p class="detalle-precio">
                    <?php echo $producto->getPrecioFormateado(); ?>
                </p>

                <p class="detalle-fecha">
                    Ingresó al catálogo: <strong><?php echo $producto->getFechaIngreso(); ?></strong>
                </p>

                <p class="detalle-fecha">
                    Stock disponible: <strong><?php echo $producto->getStock(); ?> unidades</strong>
                </p>
                <p class="card-stock">
                    <?php if ($producto->enStock()): ?>
                        <span class="stock-si">En Stock</span>
                    <?php else: ?>
                        <span class="stock-no">Sin Stock</span>
                    <?php endif; ?>
                </p>
                <br>
                <a href="index.php?seccion=tienda" class="btn-volver">Volver a la tienda</a>
            
            </div>


        </div>

    </div>

</section>
