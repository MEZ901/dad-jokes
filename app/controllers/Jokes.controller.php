<?php

class Jokes {
    use Controller;
    public function index(){
        $joke = new Joke;

        /** insert the joke **/
        if($joke->validate($_POST)){
            $joke->insert($_POST);
            insertIntoCookies($_POST['joke']);
            redirect('jokes');
        }
        $data['errors'] = $joke->errors;

        /** delete joke **/
        if(isset($_POST["delete"])){
            $id = $_POST["id"];
            $joke->delete($id);
        }
        
        /** view page **/
        $this->view('jokes', $data);

        /** show the jokes **/
        $result = $joke->getAll();
        $action = "hidden";
        if(!empty($result)){
            foreach($result as $row){
                if(isset($_COOKIE['jokes'])){ 
                    existCookies($row["joke"]) ? $action = "" : $action = "hidden" ;
                }
                echo
                    '<section class="m-5">
                        <div class="text-center w-100 p-6 border rounded-lg shadow-md bg-gray-800 border-gray-700 m-auto mb-5">
                            <blockquote class="text-xl italic font-semibold text-white">
                                <p>'. $row["joke"] .'</p>
                            </blockquote>
                            <div class="action '. $action .'">
                                <button type="button" class="focus:outline-none focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mt-3 bg-gray-600 text-white border-gray-600 hover:border-gray-400 focus:ring-gray-700">edit</button>
                                <button type="button" id="deleteButton" data-modal-toggle="deleteModal" onclick="getId('. $row["id"] .')" class="focus:outline-none focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mt-3 bg-gray-600 text-white border-gray-600 hover:border-gray-400 focus:ring-gray-700">delete</button>
                            </div>
                        </div>
                    </section>';
            }
        }else{
            echo 
                '<blockquote class="text-xl italic font-semibold text-center text-white">
                    <p>"There is no jokes yet"</p>
                </blockquote>';
        }
        
    }
}

?>