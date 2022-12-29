<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Main library</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="main.html">Городская библиотека</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="main.html">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="catalog.php">Каталог</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.html">О нас</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="libraries.php"><strong>Контакты</strong></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/admin.php">Панель Администратора</a>
                </li>
                </ul>
            </div>
            </nav>
    <div id="header-featured">
        <div id="banner-wrapper" style='display: flex;'>
            <?php
                $mysqli = new mysqli("db", "mysql", "123456", "app_db");
                $result = $mysqli->query("SELECT * FROM library");
                foreach ($result as $row) {
                    echo "
                    <div class='card' style='width: 18rem; margin: 5px; border-radius: 15px;'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$row["name"]}</h5>
                            <p class='card-text'>{$row['address']}</p>
                        </div>
                    </div>
                    ";
                }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>