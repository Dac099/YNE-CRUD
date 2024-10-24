<section class="list-head">
    <h1>Almacenes</h1>
    <a href="/yne-crud/warehouse-create">Agregar</a>
</section>

<section class="list-body">
    <?php
        if(!empty($warehouses))
        {
            foreach($warehouses as $warehouse)
            {
                ob_start();
                require "src/Components/WarehouseCard.php";
                $warehouseCard = ob_get_clean();
                echo $warehouseCard;
            }
        }else{
            echo "
                <p class='list-body--text'>Aún no agregas almacenes</p>
            ";
        }
    ?>
</section>