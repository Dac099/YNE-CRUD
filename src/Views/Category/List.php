<section class="list-head">
    <h1>Categorías</h1>
    <a href="/yne-crud/categories-create">Agregar</a>
</section>

<section class="list-body">
    <?php
    if(!empty($categories)) {

        foreach($categories as $category) {
            ob_start();
            require "src/Components/CategoryCard.php";
            $categoryCard = ob_get_clean();
            echo $categoryCard;
        }

    }else{
        echo "
                <p class='list-body--text'>No cuentas con categorías creadas</p>
            ";
    }
    ?>
</section>
