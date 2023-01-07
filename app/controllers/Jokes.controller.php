<?php

class Jokes {
    use Controller;
    public function index(){
        $joke = new Joke;

        /** insert the joke **/
        if($joke->validate($_POST)){
            $joke->insert($_POST);
            redirect('jokes');
        }
        $data['errors'] = $joke->errors;
        
        /** view page **/
        $this->view('jokes', $data);

        /** show the jokes **/
        $result = $joke->getAll();
        foreach($result as $row){
            echo
                '<section class="m-5">
                <div class="text-center w-100 p-6 border rounded-lg shadow-md bg-gray-800 border-gray-700 m-auto mb-5">
                    <blockquote class="text-xl italic font-semibold text-white">
                        <p>'. $row["joke"] .'</p>
                    </blockquote>
                    <div class="action hidden">
                        <button type="button" class="focus:outline-none focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mt-3 bg-gray-600 text-white border-gray-600 hover:border-gray-400 focus:ring-gray-700">edit</button>
                        <button type="button" class="focus:outline-none focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mt-3 bg-gray-600 text-white border-gray-600 hover:border-gray-400 focus:ring-gray-700">delete</button>
                    </div>
                </div>
            </section>';
        }
        
    }
}

?>