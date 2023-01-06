<?php

class Home extends Controller {
    public function index(){
        $joke = new Joke;
        $arr['joke'] = "What did Baby Corn say to Mama Corn? Where's Pop Corn?";
        $result = $joke->getAll();
        show($result);
        $this->view('home');
    }
}

?>