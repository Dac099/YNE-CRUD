<?php
namespace Dac099\YneCrud\Models;
use Dac099\YneCrud\Database\Database;
use Ramsey\Uuid\Uuid;
use Exception;

class CategoryModel
{
    private string $categoryId;
    private string $title;
    private string $createdBy;
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function saveCategory(array $data): bool
    {
        $created = false;
        $this->categoryId = UUID::uuid4()->toString();
        $this->title = $data['title'];
        $this->createdBy = $data['created_by'];

        $query = "
            INSERT INTO Category
            (
                 CategoryId,
                 Title,
                 CreatedBy
                )
            VALUES
            (
                '$this->categoryId',
                '$this->title',
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

    public function getAllCategories(string $filter = ''): array
    {
        $data = [];
        $query = "SELECT * FROM Category";
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

    public function getCategory(string $categoryId): array
    {
        $data = [];

        if(!empty($categoryId))
        {
            $query = "SELECT * FROM Category WHERE CategoryId = '$categoryId'";
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

    public function updateCategory(string $categoryId, array $data): bool
    {
        $updated = false;

        if(!empty($categoryId) && !empty($data))
        {
            $title = $data['title'];
            $updatedBy = $data['updated_by'];

            $query = "
                UPDATE Category
                SET Title = '$title', UpdatedBy = '$updatedBy'
                WHERE CategoryId = '$categoryId'
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

    public function deleteCategory(string $categoryId): bool
    {
        $deleted = false;
        if(!empty($categoryId))
        {
            $query = "DELETE FROM Category WHERE CategoryId = '$categoryId'";
            try
            {
                $deleted = $this->db->runVoidQuery($query);
            }catch(Exception $e)
            {
                error_log($e->getMessage());
            }
        }

        return $deleted;
    }
}