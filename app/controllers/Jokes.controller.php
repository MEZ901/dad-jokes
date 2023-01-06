<?php

class Jokes {
    use Controller;
    public function index(){

        $joke = new Joke;

        if($joke->validate($_POST)){
            $joke->insert($_POST);
            redirect('jokes');
        }

        $data['errors'] = $joke->errors;

        $this->view('jokes', $data);
    }
}

?>