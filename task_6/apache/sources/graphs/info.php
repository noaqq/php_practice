<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Graphs</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../main.html">Городская библиотека</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../main.html"><strong>Главная</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../catalog.php">Каталог</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../aboutus.html">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../libraries.php">Контакты</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/admin.php">Панель Администратора</a>
                </li>
            </ul>
        </div>
    </nav>
    <h1>Статистика библиотеки</h1>
<div class="graphs" style="display:flex;flex-wrap: wrap; align-items: center; justify-content: space-around;">
<?php
require '../../vendor/autoload.php';
require 'data.php';
$array = Library::get_data();
foreach ($array as $human) {
    $chart_type = array_rand([1, 2, 3]);
    echo <<<graphs
            <img src="/graphs/build.php?type=$chart_type&data=$human" style="margin:5px;">
        graphs;
}
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>