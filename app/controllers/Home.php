<?php

class Home extends Controller {
    public function index(){
        // $model = new Model;
        // $arr['joke'] = 'Where do fruits go on vacation? Pear-is!';
        // $result = $model->insert($arr);
        show($result);
        $this->view('home');
    }
}

?>