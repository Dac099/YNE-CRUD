<h2 class="form--title">
    <?php
        $title = "";
        !is_null($product) ? $title = "Editando $product->Name" : $title = "Agrega un nuevo producto";
        echo $title;
    ?>
</h2>

<form action="/yne-crud/products" method="POST" class="product-form">
    <p><i>Todos los campos son requeridos</i></p>

    <section>
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" required>
    </section>

    <section>
        <label for="description">Descripción</label>
        <textarea
            name="description" id="description" required></textarea>
    </section>

    <section>
        <label for="price">Price</label>
        <input type="number" name="price" id="price" min="0" step="0.1" required>
    </section>

    <section>
        <label for="category_id">Categoría</label>
        <select name="category_id" id="category_id" required>

        </select>
    </section>

    <section>
        <label for="warehouse_id">Almacén</label>
        <select name="warehouse_id" id="warehouse_id" required>

        </select>
    </section>

    <section>
        <button type="submit">Agregar</button>
    </section>

</form>