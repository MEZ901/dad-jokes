<?php

if($_SERVER['SERVER_NAME'] == 'localhost'){
    /** database config **/
    define('DBNAME', 'dad-jokes');
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');

    define('ROOT', 'http://localhost/dad-jokes/public');
}else{
    /** database config **/
    define('DBNAME', 'dad-jokes');
    define('HOST', 'host');
    define('USER', 'root');
    define('PASSWORD', 'root');
    
    define('ROOT', 'https://www.yourwebsite.com');
}

/** debug mode **/
define('DEBUG', true);
?>