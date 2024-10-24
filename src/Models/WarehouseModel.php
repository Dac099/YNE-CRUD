<?php
namespace Dac099\YneCrud\Models;
use Ramsey\Uuid\Uuid;
use Exception;
use Dac099\YneCrud\Database\Database;

class WarehouseModel
{
    private string $warehouseId;
    private string $name;
    private string $address;
    private string $createdBy;
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function saveWarehouse(array $data): bool
    {
        $created = false;
        $this->warehouseId = UUID::uuid4()->toString();
        $this->name = $data['name'];
        $this->address = $data['address'];
        $this->createdBy = $data['created_by'];
        $query = "
            INSERT INTO Warehouse
            (
                WarehouseId,
                Name,
                Address,
                CreatedBy
            )
            VALUES
            (
                '$this->warehouseId',
                '$this->name',
                '$this->address',
                '$this->createdBy'
            )
        ";
        try
        {
            $created = $this->db->runVoidQuery($query);
        }catch(Exception $e)
        {
            error_log($e->getMessage());
        }

        return $created;
    }

    public function getAllWarehouses(string $filter = ''): array
    {
        $data = [];
        $query = "SELECT * FROM Warehouse";
        !empty($filter) && $query .= " WHERE " . $filter;

        try
        {
            $data = $this->db->runQuery($query);
        }catch(Exception $e)
        {
            error_log($e->getMessage());
        }

        return $data;
    }

    public function getWarehouse(string $warehouseId): array
    {
        $data = [];

        if(!empty($warehouseId))
        {
            $query = "SELECT * FROM Warehouse WHERE WarehouseId = '$warehouseId'";
            try
            {
                $data = $this->db->runQuery($query);
            }catch(Exception $e)
            {
                error_log($e->getMessage());
            }
        }

        return $data;
    }

    public function updateWarehouse(string $warehouseId, array $data): bool
    {
        $updated = false;

        if(!empty($warehouseId) && !empty($data))
        {
            $name = $data['name'];
            $address = $data['address'];
            $updatedBy = $data['updated_by'];

            $query = "
                UPDATE Warehouse
                SET Name = '$name', Address = '$address', UpdatedBy = '$updatedBy'
                WHERE WarehouseId = '$warehouseId'
            ";

            try
            {
                $updated = $this->db->runVoidQuery($query);
            }catch(Exception $e)
            {
                error_log($e->getMessage());
            }
        }

        return $updated;
    }

    public function deleteWarehouse(string $warehouseId): bool
    {
        $deleted = false;

        if(!empty($warehouseId))
        {
            $query = "DELETE FROM Warehouse WHERE WarehouseId = '$warehouseId'";

            try
            {
                $deleted = $this->db->runVoidQuery($query);
            }catch (Exception $e)
            {
                error_log($e->getMessage());
            }
        }

        return $deleted;
    }
}