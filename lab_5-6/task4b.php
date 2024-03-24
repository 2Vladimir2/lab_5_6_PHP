<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
</head>

<body>
    <h2>Login Form</h2>
    <form method="POST">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>

    <?php
    // Файл с данными пользователей
    $file = 'users.txt';

    // Проверяем, были ли отправлены данные формы
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Проверяем, что все поля заполнены
        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            // Зашифровываем пароль пользователя с помощью функции md5()
            $password = md5($_POST['password']);

            // Проверяем, есть ли пользователь в файле
            $users = file($file, FILE_IGNORE_NEW_LINES);
            $login = $_POST['login'] . ':' . $password;
            if (in_array($login, $users)) {
                // Перенаправляем пользователя на страницу с изображениями
                header('Location: images.php');
                exit;
            } else {
                echo "Неверный логин или пароль.";
            }
        } else {
            echo "Пожалуйста, заполните все поля.";
        }
    }
    ?>
</body>

</html>