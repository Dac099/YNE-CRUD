<?php
namespace Dac099\YneCrud\Models;
use Dac099\YneCrud\Database\Database;
use Exception;
use Ramsey\Uuid\Uuid;

class ProductModel
{
    private string $productId;
    private string $name;
    private string $description;
    private string $price;
    private string $categoryId;
    private string $warehouseId;
    private string $createdBy;
    private string $updatedBy;
    private Database $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function saveProduct(array $data): bool
    {
        $created = false;

        if(!empty($data))
        {
            $this->productId = Uuid::uuid4()->toString();
            $this->name = $data['name'];
            $this->description = $data['description'];
            $this->price = $data['price'];
            $this->categoryId = $data['category_id'];
            $this->warehouseId = $data['warehouse_id'];
            $this->createdBy = $data['created_by'];

            $query = "
                INSERT INTO Product 
                (
                    ProductId, 
                    Name, 
                    Description, 
                    Price, 
                    CategoryId, 
                    WarehouseId, 
                    CreatedBy 
                )
                VALUES
                (
                 '$this->productId',
                 '$this->name',
                 '$this->description',
                 '$this->price',
                 '$this->categoryId',
                 '$this->warehouseId',
                 '$this->createdBy'
                )
            ";

            try
            {
                $created = $this->db->runVoidQuery($query);
            }catch (Exception $e)
            {
                error_log($e->getMessage());
            }
        }

        return $created;
    }

    public function getAllProducts(string $filter = '') : array
    {
        $data = [];
        $query = "SELECT * FROM Product";
        !empty($filter) && $query .= " WHERE " . $filter;

        try
        {
            $data = $this->db->runQuery($query);
        }catch (Exception $ex)
        {
            error_log($ex->getMessage());
        }

        return $data;
    }

    public function getProduct(string $productId) : array
    {
        $data = [];

        if (!empty($productId))
        {
            $query = "SELECT * FROM Product WHERE ProductId = '$productId'";

            try
            {
                $data = $this->db->runQuery($query);
            }catch (Exception $ex)
            {
                error_log($ex->getMessage());
            }

        }

        return $data;
    }

    public function updateProduct(string $productId, array $data) : bool
    {
        $updated = false;

        if(!empty($productId) && !empty($data))
        {
            $name = $data['name'];
            $description = $data['description'];
            $price = $data['price'];
            $categoryId = $data['category_id'];
            $warehouseId = $data['warehouse_id'];
            $updatedBy = $data['updated_by'];

            $query = "
                UPDATE Product
                SET
                    Name = '$name', 
                    Description = '$description',
                    Price = $price,
                    CategoryId = $categoryId,
                    WarehouseId = $warehouseId,
                    UpdatedBy = '$updatedBy'
                WHERE ProductId = '$productId'
            ";

            try
            {
                $updated = $this->db->runVoidQuery($query);
            }catch (Exception $ex)
            {
                error_log($ex->getMessage());
            }

        }

        return $updated;
    }

    public function deleteProduct(string $productId) : bool
    {
        $deleted = false;

        if(!empty($productId))
        {
            $query = "UPDATE Product SET IsActive = 0 WHERE ProductId = '$productId'";
            try
            {
                $deleted = $this->db->runVoidQuery($query);
            }catch(Exception $ex)
            {
                error_log($ex->getMessage());
            }

        }
        return $deleted;
    }
}