<?php

namespace Dac099\YneCrud\Controllers;
use Dac099\YneCrud\Models\ProductModel;

class ProductController
{
    private ProductModel $model;
    public function __construct()
    {
        $this->model = new ProductModel();
    }

    public function listAllProducts():void
    {
        $viewPath = "src/Views/Product/List.php";
        $products = $this->model->getAllProducts();

        ob_start();
        require "src/Views/Product/List.php";
        $content = ob_get_clean();

        require "src/Views/Layout.php";
    }

    public function formProduct(string $productId = ""):void
    {
        $viewPath = "src/Views/Product/FormProduct.php";
        $product = null;

        if(!empty($productId))
        {
            $product = $this->model->getProduct($productId);
        }

        ob_start();
        require "src/Views/Product/FormProduct.php";
        $content = ob_get_clean();

        require "src/Views/Layout.php";
    }
}
