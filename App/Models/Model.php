<?php

include '../DB/Connection.php';
include '../Contracts/Base.php';

class Model extends Connection implements Base
{

    protected $bindData = [];

    public function __construct($model)
    {
        $this->Model = $model;
        $this->connect();
    }

    /**
     * get all the records in a model
     */
    public function all()
    {
        $result = $this->fetchAll();
        return $result ? $result->fetch_assoc() : [];
    }

    /**
     * get a specific record by id
     */
    public function getById(int $id)
    {
        $result = $this->fetchWithId($id);
        return $result ? $result->fetch_assoc() : [];
    }

    /**
     * get records based on a where condition
     */
    public function getWhere(array $condition = [])
    {
        $result = $this->fetchWithWhere($condition);
        return $result ? $result->fetch_object() : [];
    }

    private function fetchWithWhere($condition)
    {
        $string_condition = $this->perparedWhere($condition);
        $stmt = $this->conn->prepare("SELECT * FROM $this->Model WHERE $string_condition");

        foreach ($this->bindData as $data) {
            $stmt->bind_param('s', $data);
        }

        $stmt->execute();
        return $stmt->get_result();
    }

    private function perparedWhere($condition)
    {
        $where_string = '';
        $length = count($condition);
        $check = 0;
        foreach ($condition as $key => $value) {
            if (++$check == $length) {
                $where_string .= " $key = ?";
                array_push($this->bindData, $value);
            } else {
                $where_string .= " $key = ? AND ";
                array_push($this->bindData, $value);
            }
        }
        return $where_string;
    }

    private function fetchWithId(int $id) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->Model WHERE id = ? ");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    private function fetchAll() {
        $stmt = $this->conn->prepare("SELECT * FROM $this->Model");
        $stmt->execute();
        return $stmt->get_result();
    }
}
