<section class="list-head">
    <h1>Productos</h1>
    <a href="/yne-crud/products">Agregar</a>
</section>

<section class="list-body">
    <?php
        if(!empty($products)) {

            foreach($products as $product) {
                ob_start();
                require "src/Components/ProductCard.php";
                $productCard = ob_get_clean();
                echo $productCard;
            }

        }else{
            echo "
                <p class='list-body--text'>No cuentas con productos</p>
                <p class='list-body--text'>Primero intenta agregando un almacén y una categoría</p>
            ";
        }
    ?>
</section>
