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
    <div>
        <div id="banner-wrapper" style='display:flex; align-items:center;justify-content:center;'>
        <?php
            echo "<span class='badge text-bg-primary' style='weight: 50px; height: 50px;display:flex; align-items:center;justify-content:center;'>Тут находиться панель администратора</span>";         
        ?>
        </div>
    </div>
    <!--                                                 -->
    <div class="wrapper" style="display:flex; align-items:center; justify-content:center:">
    <div class="books" style="margin:5px; border-radius: 5px; background: linear-gradient(skyblue, pink); backdrop-filter: blur(15px);">
    <h3>Книги</h3>
    <div class="container">
    <div class="row">
      <?php
      $mysqli = new mysqli("db", "mysql", "123456", "app_db");
      $result = $mysqli->query("SELECT * FROM book");
      foreach ($result as $row) {
        echo "
        <div class='col'>
          <div class='card' style='width: 18rem; margin:3px;'>
            <div class='card-body'>
              <h5 class='card-title'>{$row["name"]}</h5>
              <h6 class='card-subtitle mb-2 text-muted'>{$row['author']}</h6>
              <p class='card-text'>Lorem ipsum dolor sit amet.</p>
              <div class='container'>
                <div class='row'>
                  <div class='col'>
                  <a href='/admin/edit.php?type=book&id={$row['id']}' class='btn btn-primary'>Изменить</a>
                  <a href='/admin/api/delete.php?type=book&id={$row['id']}' class='btn btn-primary'></a>Удалить</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        ";
      }
      ?>
    </div>
    <br />
    <div class="row">
      <div class="col">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <div class="container">
              <div class="row">
                <a href="/admin/add.php?type=book" class="btn btn-primary" style="margin: 3px;">Добавить</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <br />
  <div class="library" style="margin:5px; border-radius: 5px; background: linear-gradient(skyblue, pink); backdrop-filter: blur(15px);">
  <h3>библиотеки</h3>
  <div class="container">
    <div class="row">
      <?php
      $mysqli = new mysqli("db", "mysql", "123456", "app_db");
      $result = $mysqli->query("SELECT * FROM library");
      foreach ($result as $row) {
        echo "
        <div class='col'>
          <div class='card' style='width: 18rem; margin:3px;'>
            <div class='card-body'>
              <h5 class='card-title'>{$row["name"]}</h5>
              <h6 class='card-subtitle mb-2 text-muted'>{$row['address']}</h6>
              <p class='card-text'>Lorem ipsum dolor sit amet.</p>
              <div class='container'>
                <div class='row'>
                  <div class='col'>
                    <a href='/admin/edit.php?type=library&id={$row['id']}' class='btn btn-primary'>Изменить</a>
                    <a href='/admin/api/delete.php?type=library&id={$row['id']}' class='btn btn-primary'>Удалить</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        ";
      }
      ?>
    </div>
    <br />
    <div class="row">
      <div class="col">
        <div class="card" style="width: 18rem;">
          <div class="card-body">
            <div class="container">
              <div class="row">
                <a href="/admin/add.php?type=library" class="btn btn-primary" style="margin:3px;">Добавить</a>
    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
  </div>
  <!--                                                            -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>