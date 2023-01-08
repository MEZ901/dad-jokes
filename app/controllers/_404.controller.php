<?php

class _404 {
    use Controller;
    public function index($url){
        $this->view('404');
    }
}

?>