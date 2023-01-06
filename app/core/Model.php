<?php

class Model  {
    use Database;

    protected $table = 'jokes';
    protected $limit = 10;
    protected $offset = 0;

    public function where($data, $data_not = []){
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $str = "";
        $query = "select * from $this->table where ";

        foreach($keys as $key){
            $query .= $key . " = :" . $key . " && ";
        }

        foreach($keys_not as $key){
            $query .= $key . " != :" . $key . " && ";
        }
        
        $query = trim($query, " && ");
        $query .= " limit $this->limit offset $this->offset";

        $data = array_merge($data, $data_not);
        return $this->query($query, $data);
    }

    public function first($data, $data_not = []){
        $keys = array_keys($data);
        $keys_not = array_keys($data_not);
        $str = "";
        $query = "select * from $this->table where ";

        foreach($keys as $key){
            $query .= $key . " = :" . $key . " && ";
        }

        foreach($keys_not as $key){
            $query .= $key . " != :" . $key . " && ";
        }
        
        $query = trim($query, " && ");
        $query .= " limit $this->limit offset $this->offset";

        $data = array_merge($data, $data_not);
        $result = $this->query($query, $data);
        if($result) return $result[0];
        return false;
    }

    public function insert($data){
        
    }

    public function update($id, $data){

    }

    public function delete($id){

    }
}

?>