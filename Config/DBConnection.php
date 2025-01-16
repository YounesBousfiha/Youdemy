<?php

namespace Younes\Youdemy\Config;

use PDO;
class DBConnection
{
    private static $instance = null;
    public $conn;
    private $user;
    private $password;
    private $dbname;
    private $host;

    private function __construct()
    {
        $this->user = 'root';
        $this->password = 'MyStr0ng!Passw0rd';
        $this->dbname = 'Youdemy';
        $this->host = 'localhost';

        try {
          $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", "{$this->user}", "{$this->password}");
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function getConnection() {
        if(self::$instance === null) {
            self::$instance = new DBConnection();
        }
        return self::$instance;
    }

    public function __clone() {}

}