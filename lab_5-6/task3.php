<?php if (!isset($_REQUEST['start'])) { ?>
    <form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
        <div>
            <label>Ваше имя: <input name="name" type="text" size="30"></label>
        </div>
        <br>
        <div>
            <label>Ваш возраст<input name="age" type="number" size="100"></label>
        </div>
        <br>
        <div>
            <label>Ваш email: <input name="email" type="email" size="30"></label>
        </div>
        <br>
        <div>
            <label>Ваше мнение о нас напишите тут:
                <textarea name="message" cols="40" rows="4" placeholder="Ваше мнение..."></textarea>
            </label>
        </div>
        <div>
            <input type="reset" value="Стереть" />
            <input type="submit" value="Передать" name="start" />
        </div>
    </form>
<?php } else {
    // Данные с формы
    $data = [
        'name' => $_POST['name'] ?? "",
        'message' => $_POST['message'] ?? "",
        'age' => $_POST['age'] ?? "",
        'email' => $_POST['email'] ?? ""
    ];
    // Сохранение данных в файл
    $file = fopen('messages.txt', 'a+') or die("Недоступный файл!");
    foreach ($data as $field => $value) {
        // Добавьте код для сохранения данных в файл
        fwrite($file, $value . " ");
    }
    fwrite($file, "\n");
    fclose($file);
    // Вывод данных на экран
    echo 'Данные были сохранены! Вот что хранится в файле: <br />';
    $file = fopen("messages.txt", "r") or die("Недоступный файл!");
    while (!feof($file)) {
        echo fgets($file) . "<br />";
    }
    fclose($file);
}