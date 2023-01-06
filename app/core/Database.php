<?php

trait Database {
    private function connect(){
        $string = "mysql:hostname=".HOST.";dbname=".DBNAME;
        $conn = new PDO($string, USER, PASSWORD);
        return $conn;
    }

    public function query($query, $data = []){
        $conn = $this->connect();
        $stmt = $conn->prepare($query);
        $check = $stmt->execute($data);
        if($check){
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($result) && count($result)){
                return $result;
            }
        }
        return false;
    }

    public function get_row($query, $data = []){
        $conn = $this->connect();
        $stmt = $conn->prepare($query);
        if($stmt->execute($data)){
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($result) && count($result)){
                return $result[0];
            }
        }
        return false;
    }
}
?>