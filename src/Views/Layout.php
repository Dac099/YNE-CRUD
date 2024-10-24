<?php
    $component = !is_null($content) ? $content : 'Nada que mostrar';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/Styles/layout.css">
    <link rel="stylesheet" href="public/Styles/ProductList.css">
    <link rel="stylesheet" href="public/Styles/FormProduct.css">
    <title>YNE-CRUD</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="/yne-crud/">Productos</a>
                </li>
                <li>
                    <a href="/yne-crud/categories">Categorías</a>
                </li>
                <li>
                    <a href="/yne-crud/warehouse">Almacenes</a>
                </li>
                <li>
                    <a href="/yne-crud/users">Usuarios</a>
                </li>
                <li>
                    <a href="/yne-crud/signout">Salir</a>
                </li>
            </ul>
        </nav>
        <hr/>
    </header>
    <main>
        <?php echo $component; ?>
    </main>
    <footer>
        <hr />
        <p>YNE-CRUD PRUEBA TÉCNICA</p>
    </footer>
</body>
</html>