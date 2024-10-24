<?php
namespace Dac099\YneCrud\Models;
use Dac099\YneCrud\Database\Database;
use Ramsey\Uuid\Uuid;
use Exception;

class UserModel
{
    private Database $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function saveUser(array $data): bool
    {
        $created = false;
        if(!empty($data))
        {
            $userId = UUID::uuid4()->toString();
            $name = $data['name'];
            $email = $data['email'];
            $password = $data['password'];

            $query = "
                INSERT INTO User
                (
                     UserId,
                     Name,
                     Email,
                     Password,
                     isAdmin,
                )
                VALUES
                (
                    '$userId',
                    '$name',
                    '$email',
                    '$password',
                    0
                )
            ";

            try
            {
                $created = $this->db->runVoidQuery($query);
            }catch(Exception $e)
            {
                error_log($e->getMessage());
            }
        }

        return $created;
    }

    public function getAllUsers(): array
    {
        $data = [];
        $query = "SELECT * FROM User";

        try
        {
            $data = $this->db->runQuery($query);
            echo 'Después de query';
            var_dump($data);
        }catch(Exception $e)
        {
            error_log($e->getMessage());
        }
        return $data;
    }

    public function getUser(string $userId): array
    {
        $data = [];
        if(!empty($userId))
        {
            $query = "SELECT * FROM User WHERE UserId = '$userId'";
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

    public function makeAdmin(string $userId): bool
    {
        $updated = false;

        if(!empty($userId))
        {
            $query = "
                UPDATE User SET isAdmin = 1 WHERE UserId = '$userId'
            ";

            try
            {
                $updated = $this->db->runQuery($query);
            }catch(Exception $e)
            {
                error_log($e->getMessage());
            }
        }

        return $updated;
    }
}