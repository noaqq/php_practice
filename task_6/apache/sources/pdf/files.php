<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PDF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
</head>
<ol>
<body>
<form enctype="multipart/form-data" action="loader.php" method="POST">
    <div>
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000"/>
    <br>
    <label class="custom-file-label" for="file_field">Отправить этот файл:</label>
    <br>
    <input class="custom-file-input" id="file_field" name="userfile" type="file"/>
    </div>
    <br>
    <input  type="submit" value="Отправить файл"/>
</form>


<?php
$files = scandir('./files');
if (count($files) <= 2) {
    echo "<h2>Нет загруженных файлов</h2>";
} else {
    echo "<h2>Загруженные файлы</h2>";
    foreach ($files as $file) {
        if ($file != "." and $file != "..") {
            echo "<div ><a  href='http://localhost:8080/pdf/files/".$file."' download>".$file."</a></div>";
        }
    }
}
?>
</body>
</ol>
</html>
