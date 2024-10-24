<h2 class="form--title">
    <?php
    $title = "";
    !is_null($category) ? $title = "Editando $category->Name" : $title = "Agrega una nueva categoría";
    echo $title;
    ?>
</h2>

<form action="/yne-crud/categories" method="POST" class="product-form">
    <p><i>El nombre es requerido</i></p>

    <section>
        <label for="name">Nombre</label>
        <input type="text" name="name" id="name" required>
    </section>

    <section>
        <button type="submit">Agregar</button>
    </section>

</form>