<?php

spl_autoload_register(function($className){
    require $filename = "../app/models/".ucfirst($className).".model.php";
});

require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'app.php';

?>