<?php

class Home extends Controller {
    public function index(){
        $joke = new Joke;
        $arr['joke'] = "I asked my dog what's two minus two. He said nothing.";
        $result = $joke->update(3,$arr);
        show($result);
        $this->view('home');
    }
}

?>