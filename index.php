<?php
error_reporting(E_ALL);
ini_set('ignore_repeated_errors', true);
ini_set('display_errors', false);
ini_set('log_errors', true);
ini_set('error_log', 'php-error.log');

include 'vendor/autoload.php';
use Dotenv\Dotenv;
use Dac099\YneCrud\Lib\Routes;
use Dac099\YneCrud\Database\Database;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$db = new Database();
$db->initDatabase();

$routes = new Routes();