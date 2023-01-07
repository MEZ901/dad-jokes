<?php

function show($stuff){
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function esc($str){
    return htmlspecialchars($str);
}

function redirect($path){
    header("location: " . ROOT . "/" . $path);
    die;
}

function insertIntoCookies($joke) {
    $currentJokes = $_COOKIE["jokes"];
    
    if ($currentJokes == "") {
      setcookie("jokes", $joke);
    } else {
      $currentJokes .= "|" . $joke;
      setcookie("jokes", $currentJokes);
    }
}

function existCookies($joke) {
    $currentJokes = $_COOKIE["jokes"];
    
    if (preg_match("/\b" . $joke . "\b/i", $currentJokes)) {
      return true;
    } else {
      return false;
    }
}

?>