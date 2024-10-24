<?php
namespace Dac099\YneCrud\Controllers;
use Dac099\YneCrud\Models\WarehouseModel;

class WarehouseController
{
    private WarehouseModel $model;

    public function __construct()
    {
        $this->model = new WarehouseModel();
    }

    public function listAllWarehouse(): void
    {
        $warehouses = $this->model->getAllWarehouses();

        ob_start();
        require "src/Views/Warehouse/List.php";
        $content = ob_get_clean();

        require "src/Views/Layout.php";
    }

    public function formWarehouse(string $warehouseId = ''): void
    {
        $viewPath = "src/Views/Warehouse/FormWarehouse.php";
        if(!empty($warehouseId))
        {
            $warehouse = $this->model->getWarehouse($warehouseId);
        }

        ob_start();
        require $viewPath;
        $content = ob_get_clean();
        require "src/Views/Layout.php";
    }
}