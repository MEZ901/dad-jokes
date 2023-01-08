<?php

class Jokes {
    use Controller;
    public function index(){
        $joke = new Joke;

        /** insert the joke **/
        if(isset($_POST["insert"])){
            if($joke->validate($_POST)){
                $joke->insert($_POST);
                insertIntoCookies($_POST['joke']);
                redirect('jokes');
            }
        }
        $data['errors'] = $joke->errors;

        /** delete joke **/
        if(isset($_POST["delete"])){
            $id = $_POST["id"];
            $joke->delete($id);
        }

        /** update joke **/
        if(isset($_POST["update"])){
            $id = $_POST["update_id"];
            $data["joke"] = $_POST["joke"];
            insertIntoCookies($_POST['joke']);
            $joke->update($id, $data);
        }
        
        /** view page **/
        $this->view('jokes', $data);

        /** show the jokes **/
        $result = $joke->getAll();
        $action = "hidden";
        if(!empty($result)){
            echo '<div class="m-5">   
                    <label for="default-search" class="mb-2 text-sm font-medium sr-only text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <input type="text" id="search" onkeyup="search()" class="block w-full p-4 pl-10 text-sm border rounded-lg bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search for a joke">
                    </div>
                </div>';
            foreach($result as $row){
                if(isset($_COOKIE['jokes'])){ 
                    existCookies($row["joke"]) ? $action = "" : $action = "hidden" ;
                }
                echo
                    '<section class="m-5 jokes_section">
                        <div class="text-center w-100 p-6 border rounded-lg shadow-md bg-gray-800 border-gray-700 m-auto mb-5">
                            <blockquote class="text-xl italic font-semibold text-white">
                                <p id="joke_content">'. $row["joke"] .'</p>
                            </blockquote>
                            <div class="action '. $action .'">
                                <button type="button" id="updateButton"  data-modal-toggle="defaultModal" onclick="edit('. $row["id"] .',`'. $row["joke"] .'`)" class="focus:outline-none focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mt-3 bg-gray-600 text-white border-gray-600 hover:border-gray-400 focus:ring-gray-700">edit</button>
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