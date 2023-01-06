<?php

spl_autoload_register(function($className){
    require $filename = "../app/models/".ucfirst($className).".php";
});

require 'config.php';
require 'functions.php';
require 'Database.php';
require 'Model.php';
require 'Controller.php';
require 'app.php';

?>