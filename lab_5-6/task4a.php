<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
</head>

<body>
    <h2>Registration Form</h2>
    <form method="POST">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Register">
    </form>

    <?php
    // Файл для сохранения данных пользователя
    $file = 'users.txt';

    // Проверяем, были ли отправлены данные формы
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Проверяем, что все поля заполнены
        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            // Проверяем, существует ли уже такой пользователь
            $login = $_POST['login'];
            if(strpos(file_get_contents('users.txt'), $login) !== false){
                echo "Пользователь с таким логином или паролем уже существует.";
                exit;
            } else {
                // Зашифровываем пароль пользователя с помощью функции md5()
                $password = md5($_POST['password']);

                // Сохраняем данные пользователя в текстовый файл в формате: login:password
                $user_data = $_POST['login'] . ':' . $password . "\n";
                file_put_contents($file, $user_data, FILE_APPEND);

                // Отправляем HTTP-код 201 (Created)
                http_response_code(201);
                echo "Регистрация прошла успешно! Вы будете перенаправлены через 3 секунды.";

                // Перенаправляем пользователя на task4b.php через 3 секунды
                echo "<meta http-equiv='refresh' content='3;url=task4b.php'>";
            }
        } else {
            echo "Пожалуйста, заполните все поля.";
        }
    }

    ?>
</body>

</html>