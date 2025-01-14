<?php

namespace Younes\Youdemy\Config;

class DBConnection
{
    private static $instance = null;
    public $conn;
    private $user;
    private $password;
    private $dbname;
    private $host;

    private function __construct($user, $password, $dbname, $host)
    {
        $this->user = $user;
        $this->password = $password;
        $this->dbname = $dbname;
        $this->host = $host;

        try {
          $this->conn = new \PDO("mysql:{$this->host};dbname={$this->dbname}", "{$this->user}", "{$this->password}");
          $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
          $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public static function getConnection() {
        if(self::$instance === null) {
            self::$instance = new DBConnection('root', 'MyStr0ng!Passw0rd', 'Youdemy', 'localhost');
        }
        return self::$instance;
    }

    public function __clone() {}

}