<?php

class Jokes extends Controller {
    public function index(){
        echo "this is jokes page";
        $this->view('jokes');
    }
}