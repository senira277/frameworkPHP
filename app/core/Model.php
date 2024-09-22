<?php

//main Model trait
trait Model
{

    use Database;
    protected $limit = 10;
    protected $offset = 0;
    

    //get any record
    public function where($data, $data_not = [])
    {

        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";
        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . " && ";
        }

        foreach ($keys_not as $key) {
            $query .= $key . " != :" . $key . " && ";
        }

        $query = trim($query, " && ");

        $query .= " LIMIT $this->limit OFFSET $this->offset";

        $data = array_merge($data, $data_not);

        return $this->query($query, $data);
    }

    //get first record
    public function first($data, $data_not = [])
    {
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $query = "SELECT * FROM $this->table WHERE ";
        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . " && ";
        }

        foreach ($keys_not as $key) {
            $query .= $key . " != :" . $key . " && ";
        }

        $query = trim($query, " && ");

        $query .= " LIMIT $this->limit OFFSET $this->offset";

        $data = array_merge($data, $data_not);

        $result = $this->query($query, $data);
        if ($result)
            return $result[0];

        return false;
    }

    //insert to table
    public function insert($data)
    {

        $keys = array_keys($data);
        $query = "INSERT INTO $this->table (" . implode(",", array: $keys) . ") VALUES (:" . implode(",:", array: $keys) . ") ";

        $this->query($query, $data);

        return false;

    }
    //update
    public function update($id, $data, $id_column = 'id')
    {

        $keys = array_keys($data);
        // $keys_not = array_keys($data_not);
        $query = "UPDATE $this->table SET ";
        foreach ($keys as $key) {
            $query .= $key . " = :" . $key . ", ";
        }

        $query = trim($query, ", ");
        $data[$id_column] = $id;
        $query .= " WHERE $id_column = :$id_column";
           $this->query($query, $data);

        return false;
    }
    //delete
    public function delete($id, $id_column = 'id')
    {
        $data[$id_column] = $id;
        $query = "DELETE FROM $this->table WHERE $id_column = :$id_column";


        $this->query($query, $data);

        return false;

    }

}