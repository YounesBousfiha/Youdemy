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
        $this->user = 'younes';
        $this->password = 'test123';
        $this->dbname = 'youdemy';
        $this->host = 'localhost';

        try {
          $this->conn = new PDO("pgsql:host={$this->host};dbname={$this->dbname}", "{$this->user}", "{$this->password}");
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        } catch (\Exception $e) {
            echo 'Error DB: ' . $e->getMessage();
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