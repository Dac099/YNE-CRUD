<?php
namespace Dac099\YneCrud\Database;
use mysqli;
use Exception;
use Dac099\YneCrud\Util\Constansts;

class Database
{
    private mysqli $conn;

    public function __construct()
    {

        $this->getConnection();

        if ($this->conn->connect_error) {
            error_log("Database Connection Failed: " . $this->conn->connect_error);
        }
    }

    private function getConnection(string $dbName = ''): void
    {
        try
        {
            $this->conn = new mysqli(
                $_ENV['DB_HOST'],
                $_ENV['DB_USER'],
                $_ENV['DB_PASSWORD'],
                !empty($dbName) ? $dbName : null
            );
        }catch (Exception $e)
        {
            error_log("Database Connection Failed: " . $e->getMessage());
        }
    }
    public function initDatabase():void
    {
        try
        {
            $this->runCreateQuery(Constansts::$database);
            $this->runCreateQuery(Constansts::$useDB);
            $this->runCreateQuery(Constansts::$userTable);
            $this->runCreateQuery(Constansts::$userLogsTable);
            $this->runCreateQuery(Constansts::$categoryTable);
            $this->runCreateQuery(Constansts::$CategoryLogsTable);
            $this->runCreateQuery(Constansts::$warehouseTable);
            $this->runCreateQuery(Constansts::$WarehouseLogsTable);
            $this->runCreateQuery(Constansts::$productTable);
            $this->runCreateQuery(Constansts::$productLogsTable);
        }catch(Exception $e)
        {
            error_log("Database creation error: " . $e->getMessage());
        } finally {
            $this->conn->close();
        }
    }

    public function runQuery(string $query): array
    {
        $data = [];

        if(!$this->conn->ping())
        {
            $this->getConnection();
        }

        try
        {
            $response = $this->conn->query($query);
            $data = $response->fetch_assoc();
        }catch(Exception $e) {

            error_log("Database query error: " . $e->getMessage());
        }
        return $data;
    }

    //runVoidQuery means that execute a query without data in result
    public function runVoidQuery(string $query): bool
    {
        $response = false;

        if(!$this->conn->ping())
        {
            $this->getConnection();
        }

        try
        {
            $response = $this->conn->query($query) === true;

        }catch(Exception $e) {

            error_log("Database query error: " . $e->getMessage());
        }finally
        {
            $this->conn->close();
        }
        return $response;
    }

    private function runCreateQuery(string $query): void
    {
        try
        {
            $this->conn->query($query);
        }catch(Exception $e)
        {
            error_log("Database query create error: " . $e->getMessage());
        }
    }
}