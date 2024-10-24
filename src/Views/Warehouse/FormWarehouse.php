<h2 class="form--title">
    <?php
    $title = "";
    !is_null($warehouse) ? $title = "Editando $warehouse->Name" : $title = "Agrega un nuevo almacén";
    echo $title;
    ?>
</h2>

<form action="/yne-crud/warehose" method="POST" class="product-form">
    <p><i>Todos los campos son requeridos</i></p>

    <section>
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" required>
    </section>

    <section>
        <label for="address">Dirección</label>
        <input type="text" name="address" id="address" required>
    </section>

    <section>
        <button type="submit">Agregar</button>
    </section>

</form>