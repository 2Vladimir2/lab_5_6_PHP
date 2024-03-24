
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RDR2</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1>Welcome to Red Dead Redemption 2 fun page</h1>
    </header>

    <h2 style="text-align: center;">Images</h2>
    <div class="container">
        <?php
        // Задаем путь к папке с изображениями
        $dir = 'image/';
        // Сканируем содержимое директории
        // scandir — Получает список файлов и каталогов, расположенных по указанному пути.
        // Возвращает array, содержащий имена файлов и каталогов, расположенных по пути, переданному в параметре
        $files = scandir($dir);
        // Если нет ошибок при сканировании
        if ($files === false) {
            return;
        }
        for ($i = 0; $i < count($files); $i++) {
            // Пропускаем текущий каталог и родительский
            if (($files[$i] != ".") && ($files[$i] != "..")) {
                // Получаем путь к изображению
                $path = $dir . $files[$i]; ?>

        <?php

                echo "<img src='$path' alt='image' width='300' height='200'>";
            }
        }
        ?>
    </div>


    <footer>
        <p>&copy; The last of us </p>
    </footer>
</body>

</html>
