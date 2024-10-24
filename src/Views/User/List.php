<section class="list-head">
    <h1>Usuarios</h1>
    <a href="/yne-crud/users-create">Agregar</a>
</section>

<section class="list-body">
    <?php
    if(!empty($users)) {

        foreach($users as $user) {
            ob_start();
            require "src/Components/UserCard.php";
            $productCard = ob_get_clean();
            echo $productCard;
        }

    }else{
        echo "
                <p class='list-body--text'>Aún no hay usuarios agregados</p>
            ";
    }
    ?>
</section>
