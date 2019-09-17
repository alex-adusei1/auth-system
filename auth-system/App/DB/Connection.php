<?php

class Connection
{
    protected $servername = 'localhost';
    protected $dbname = 'auth_system_db';
    protected $username = 'root';
    protected $password = '';
    protected $conn;

    public function connect()
    {
        try {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
                return;
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }

    public function close()
    {
        $this->conn = null;
    }
}
