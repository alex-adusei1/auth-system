<?php

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
     * Get a specific record by id
     * @param int $id
     */
    public function getById(int $id)
    {
        $result = $this->fetchWithId($id);
        return $result ? $result->fetch_assoc() : [];
    }

    /**
     * Get records based on a where condition
     *
     * @param array $condition
     * @return mixed
     */
    public function getWhere(array $condition = [])
    {
        $result = $this->fetchWithWhere($condition);
        return $result ? $result->fetch_object() : [];
    }

    /**
     * Insert record to DB
     *
     * @param array $data
     * @return mixed
     */
    public function save(array $data)
    {
        try {
            if ($this->hasData($data) && $this->isUserRecordUnique($data['email'])) {
                $data['password'] = $hash = password_hash($data['password'], PASSWORD_DEFAULT);
                $values = $this->determineValue(array_values($data), '?, ', '?');
                $columns = implode(',', array_keys($data));
                $stmt = $this->conn->prepare("INSERT INTO $this->Model ($columns) VALUES($values)");
                $stmt->bind_param($this->determineValue($data, 's', 's'), $data['fullname'], $data['email'], $data['password']);

                foreach ($data as $key => $value) {
                    $key = $value;
                }

                return $stmt->execute();

            }
        } catch (Exception $e) {
            error_log($e->getMessage());
            session_start();
            $_SESSION['errors'] = $e->getMessage();
        }
    }

    /**
     * @param array $condition
     * @return mixed
     */
    private function fetchWithWhere(array $condition)
    {
        $string_condition = $this->perparedWhere($condition);
        $stmt = $this->conn->prepare("SELECT * FROM $this->Model WHERE $string_condition");

        foreach ($this->bindData as $data) {
            $stmt->bind_param('s', $data);
        }

        $stmt->execute();
        return $stmt->get_result();
    }

    /**
     * @param array $condition
     * @return string
     */
    private function perparedWhere(array $condition)
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

    /**
     * Fetch data with the id
     *
     * @param int $id
     * @return mixed
     */
    private function fetchWithId(int $id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->Model WHERE id = ? ");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    /**
     * Fetch all the data
     *
     * @return mixed
     */
    private function fetchAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM $this->Model");
        $stmt->execute();
        return $stmt->get_result();
    }

    /**
     * Check if request has data
     *
     * @param array $data
     * @return bool
     */
    private function hasData(array $data): bool
    {
        if (count($data) < 1) {
            throw new Exception('No Request Data Found');
            return false;
        }
        return true;
    }

    /**
     * Check if record is unique
     *
     * @param string $email
     * @return bool
     */
    private function isUserRecordUnique($email): bool
    {
        if ($this->getWhere(['email' => $email]) !== null) {
            throw new Exception('User Record Already Exists');
            return false;
        }
        return true;
    }

    /**
     * Determines value for insertion
     *
     * @param array $data
     * @param string $normal
     * @param string $end
     * @return string
     */
    private function determineValue(array $data, string $normal, string $end): string
    {
        $values = '';
        $length = count($data);
        $check = 0;

        for ($i = 0; $i < count($data); $i++) {
            if (++$check == $length) {
                $values .= $end;
            } else {
                $values .= $normal;
            }
        }
        return $values;
    }
}
