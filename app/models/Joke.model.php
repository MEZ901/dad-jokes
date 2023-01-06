<?php

class Joke {
    use Model;

    protected $table = 'jokes';
    protected $allowedColumns = [
        'joke'
    ];

    public function validate($data){
        $this->errors = [];

        if(empty($data['joke'])){
            $this->errors['joke'] = "Joke can not be empty";
        }

        if(empty($this->errors)){
            return true;
        }
        return false;
    }
}

?>