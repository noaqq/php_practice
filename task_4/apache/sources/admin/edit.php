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
            <a class="navbar-brand" href="../main.html">Городская библиотека</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../main.html">Главная</a>
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
                    <a class="nav-link" href="/admin/admin.php"><strong>Панель Администратора</strong></a>
                </li>
                </ul>
            </div>
            </nav>
    <!--                             -->
    <?php
    if (isset($_GET['type']) && isset($_GET['id'])) {
        $type = $_GET['type'];
        $id = $_GET['id'];
        $mysqli = new mysqli("db", "mysql", "123456", "app_db");
        $result = $mysqli->query("SELECT * FROM $type WHERE id = $id");
        $result = $result->fetch_assoc();
        switch ($type) {
            case 'book':
                echo "
                    <div class='d-flex flex-column min-vh-100 justify-content-center align-items-center'>
                        <form action='/admin/api/update.php' method='GET'>
                            <div class='mb-3'>
                                <label for='name' class='form-label'>book name</label>
                                <input name='name' type='text' class='form-control' id='name' placeholder='Name' value={$result['name']}>
                            </div>
                            <div class='mb-3'>
                                <label for='author' class='form-label'>book author</label>
                                <input name='author' type='text' class='form-control' id='author' placeholder='author' value={$result['author']}>
                            </div>
                            <input type='hidden' name='id' value='$id'>
                            <input type='hidden' name='type' value='$type'>
                            <button type='submit' class='btn btn-primary'>Change</button>
                        </form>
                    </div>
                ";
                break;
            case 'library':
                echo "
                        <div class='d-flex flex-column min-vh-100 justify-content-center align-items-center'>
                            <form action='/admin/api/update.php' method='GET'>
                                <div class='mb-3'>
                                    <label for='name' class='form-label'>library name</label>
                                    <input name='name' type='text' class='form-control' id='name' placeholder='Library' value={$result['name']}>
                                </div>
                                <div class='mb-3'>
                                    <label for='address' class='form-label'>library address</label>
                                    <input name='address' type='text' class='form-control' id='author' placeholder='address' value={$result['address']}>
                                </div>
                                <input type='hidden' name='id' value='$id'>
                                <input type='hidden' name='type' value='$type'>
                                <button type='submit' class='btn btn-primary'>Change</button>
                            </form>
                        </div>
                    ";
                break;
        }
    } else {
        echo "Bad request";
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>