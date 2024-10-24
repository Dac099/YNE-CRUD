<?php
namespace Dac099\YneCrud\Controllers;
use Dac099\YneCrud\Models\CategoryModel;

class CategoryController
{
    private CategoryModel $model;
    public function __construct()
    {
        $this->model = new CategoryModel();
    }

    public function listAllCategories(): void
    {
        $categories = $this->model->getAllCategories();
        ob_start();
        require "src/Views/Category/List.php";
        $content = ob_get_clean();

        require "src/Views/Layout.php";
    }

    public function formCategory(string $categoryId = ''): void
    {
        $category = null;

        if(!empty($categoryId))
        {
            $product = $this->model->getCategory($categoryId);
        }

        ob_start();
        require "src/Views/Category/FormCategory.php";
        $content = ob_get_clean();

        require "src/Views/Layout.php";
    }
}