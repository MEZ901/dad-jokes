<?php
    session_start();
    require "../app/core/init.php";
    DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.css" />
    <title>dad jokes</title>
</head>
<body class="bg-slate-900">

    <?php
        $app = new app;
        $app->loadController();
    ?>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.6.0/dist/flowbite.min.js"></script>
    <script src="<?= ROOT ?>/assets/js/script.js"></script>
</body>
</html>