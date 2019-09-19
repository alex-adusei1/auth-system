<?php

class Connection
{
    private $servername = 'localhost';
    private $dbname = 'auth_system_db';
    private $username = 'root';
    private $password = '';
    protected $conn;
    private static $instance;

    public static function getInstance()
    {
        if (!isset(Connection::$instance)) {
            Connection::$instance = new Connection();
            return Connection::$instance;
        }
    }

    private function __construct()
    {
        /** PRIVATE */
    }

    public function connect()
    {
        try {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
            return $this->conn;
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }

    public function close()
    {
        $this->conn = null;
    }
}
