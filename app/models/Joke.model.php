<?php

class Joke {
    use Model;

    protected $table = 'jokes';
    protected $allowedColumns = [
        'jokes'
    ];
}

?>