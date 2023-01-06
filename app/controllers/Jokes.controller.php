<?php

class Jokes {
    use Controller;
    public function index(){
        $this->view('jokes');
    }
}

?>