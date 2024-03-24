# Лабораторная работа №5-6

- [Лабораторная работа №5-6](#лабораторная-работа-5-6)
    - [Инструкции по запуску проекта](#инструкции-по-запуску-проекта)
    - [Задания](#задания)
    - [Примеры использования](#примеры-использования)
    - [Список использованных источников](#список-использованных-источников)

## Инструкции по запуску проекта
1) Склонируйте репозиторий с проектом: git clone https://github.com/2Vladimir2/lab_5_6_PHP.git
2) Запустите веб-сервер: php -S localhost:8080.
3) Откройте браузер и перейдите по адресу http://localhost:8080 для доступа к первому заданию.
4) Перейдите по адресу http://localhost:8080/task2.php для доступа ко второму заданию.
5) Перейдите по адресу http://localhost:8080/task3.php для доступа к третьему заданию.
6) Перейдите по адресу http://localhost:8080/task4a.php для доступа к четвёртому заданию.

## Задания
__1. Запись и чтение из файла__

1. Проанализируйте следующий скрипт

```php
<?php
//создание файла
$file = fopen("file.txt", "w") or die("Ошибка создания файла!");
//Вводим данные в файл
fwrite($file, "1. William Smith, 1990, 2344455666677\n");
fwrite($file, "2. John Doe, 1988, 4445556666787\n");
fwrite($file, "3. Michael Brown, 1991, 7748956996777\n");
fwrite($file, "4. David Johnson, 1987, 5556667779999\n");
fwrite($file, "5. Robert Jones, 1992, 99933456678888\n");
//Закрываем файл
fclose($file);
//Открываем файл для добавления данных
$file = fopen("file.txt", "a") or die("Ошибка открытия для добавления
данных!");
if (!$file) {
 echo("Не был найден файл для добавления данных!");
} else {
 // Добавьте в файл с помощью функции fwrite() еще 3 записи
}
fclose($file);
//Открываем файл для чтения из него
$file = fopen("file.txt", "r") or die("Ошибка открытия файла для чтения!");
if (!$file) {
 echo("Не был найден файл для чтения данных!");
} else { ?>
 <div>Данные из файла: </div>
 <?php
 while (!feof($file)) {
 echo fgets($file); ?>
 <br/>
 <?php
 }
 fclose($file);
}
```
2. Объясните, зачем необходимо закрывать файл fclose()

3. Добавьте в файл с помощью функции fwrite() ещё 3 записи

__2. Запись в файл с помощью функции file_get_contents()__

1. В задании №1 замените функцию fwrite на file_put_contents()

2. Чем отличается функция fwrite и file_put_contents?

__3. Обработка форм и файлов__

1. Проанализируйте следующий скрипт

```php
<?php if (!isset($_REQUEST['start'])) { ?>
<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="post">
 <div>
 <label>Ваше имя: <input name="name" type="text" size="30"></label>
 </div>
 <div>
 <label>Ваше мнение о нас напишите тут:
 <textarea name="message" cols="40" rows="4" placeholder="Ваше
мнение..."></textarea>
 </label>
 </div>
 <div>
 <input type="reset" value="Стереть"/>
 <input type="submit" value="Передать" name="start"/>
 </div>
</form>
<?php } else {
 // Данные с формы
 $data = [
 'name' => $_POST['name'] ?? "",
 'message' => $_POST['message'] ?? "",
 ];
 // Сохранение данных в файл
 $file = fopen('messages.txt', 'a+') or die("Недоступный файл!");
 foreach ($data as $field => $value) {
 // Добавьте код для сохранения данных в файл
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
```
2. Добавьте код, чтобы данные с формы сохранялись в файл
3. Добавьте еще 2 контроллера в форму и их верное сохранение в файл
    - Возраст (age), типа number.
    - E-mail, типа email

__4. Регистрация и авторизация пользователей__

1. Создайте HTML-форму регистрации с двумя полями: login (имя пользователя) и
password (пароль).

2. Напишите PHP-скрипт, который обрабатывает данные, отправленные с формы.

3. Скрипт должен:
    - Проверить, что все поля заполнены.
    - Зашифровать пароль пользователя с помощью функции md5().
    - Сохранить данные пользователя в текстовый файл (например, users.txt) в формате: login:password.

4. При успешной регистрации отправьте пользователю HTTP-код 201 (Created).
Объясните, для чего используются HTTP-коды.
5. Создайте HTML-форму авторизации с двумя полями: login (имя пользователя) и
password (пароль).
6. Напишите PHP-скрипт, который обрабатывает данные, отправленные с формы.
7. Скрипт должен:
    - Проверить, что все поля заполнены.
    - Проверить, существует ли пользователь с таким логином и паролем в файле users.txt.
    - Если пользователь не найден, вывести сообщение об ошибке.
    - Если пользователь найден, перенаправить его на страницу с изображениями (например, images.php) с помощью функции header().

## Примеры использования

__1. Запись и чтение из файла__

2. Объясните, зачем необходимо закрывать файл fclose()
    * Освобождение ресурсов
    * Безопасность данных
    * Сохранение изменений
4. Добавьте в файл с помощью функции fwrite() ещё 3 записи

```php
fwrite($file, "6. Richard Davis, 1993, 1234567890123\n");
fwrite($file, "7. Charles Miller, 1994, 2345678901234\n");
fwrite($file, "8. Joseph Wilson, 1995, 3456789012345\n");
```

![image](https://github.com/2Vladimir2/lab_5_6_PHP/assets/159247721/6b8b9556-8282-4f2b-b745-83784a586b93)



__2. Запись в файл с помощью функции file_get_contents()__

1. В задании №1 замените функцию fwrite на file_put_contents()
```php
<?php
//создание файла
$file = "file2.txt";
//Вводим данные в файл
file_put_contents($file, "1. William Smith, 1990, 2344455666677\n", FILE_APPEND);
file_put_contents($file, "2. John Doe, 1988, 4445556666787\n", FILE_APPEND);
file_put_contents($file, "3. Michael Brown, 1991, 7748956996777\n", FILE_APPEND);
file_put_contents($file, "4. David Johnson, 1987, 5556667779999\n", FILE_APPEND);
file_put_contents($file, "5. Robert Jones, 1992, 99933456678888\n", FILE_APPEND);

//Открываем файл для добавления данных
if (!file_exists($file)) {
    echo ("Не был найден файл для добавления данных!");
} else {
    file_put_contents($file, "6. Richard Davis, 1993, 1234567890123\n", FILE_APPEND);
    file_put_contents($file, "7. Charles Miller, 1994, 2345678901234\n", FILE_APPEND);
    file_put_contents($file, "8. Joseph Wilson, 1995, 3456789012345\n", FILE_APPEND);
}

//Открываем файл для чтения из него
if (!file_exists($file)) {
    echo ("Не был найден файл для чтения данных!");
} else { ?>
    <div>Данные из файла: </div>
    <?php
    $fileContents = file($file);
    foreach ($fileContents as $line) {
        echo $line; ?>
        <br />
<?php
    }
}
```

2. Чем отличается функция fwrite и file_put_contents?

Функции `fwrite()` и `file_put_contents()` в PHP обе используются для записи данных в файл, но они имеют некоторые различия:

1. __Простота использования:__ `file_put_contents()` является более простой функцией для записи данных в файл. Она автоматически открывает файл, записывает данные и закрывает файл. С другой стороны, `fwrite()` требует открытия файла с помощью `fopen()` перед записью и закрытия файла с помощью `fclose()` после записи.
2. __Буферизация:__ `fwrite()` записывает данные в файл непосредственно, в то время как `file_put_contents()` сначала помещает данные в буфер, а затем записывает их в файл. Это может привести к различиям в производительности, особенно при работе с большими объемами данных.
3. __Безопасность:__ `file_put_contents()` является более безопасной функцией, поскольку она автоматически блокирует файл во время записи, предотвращая одновременное изменение файла другими процессами или потоками. С другой стороны, `fwrite()` не предоставляет такой блокировки по умолчанию.


__3. Обработка форм и файлов__

2. Добавьте код, чтобы данные с формы сохранялись в файл
```php
fwrite($file, $value . " ");
```
3. Добавьте еще 2 контроллера в форму и их верное сохранение в файл
```html
<div>
    <label>Ваш возраст<input name="age" type="number" size="100"></label>
</div>
<br>
<div>
    <label>Ваш email: <input name="email" type="email" size="30"></label>
</div>
```
```php
'age' => $_POST['age'] ?? "",
'email' => $_POST['email'] ?? ""
```

![image](https://github.com/2Vladimir2/lab_5_6_PHP/assets/159247721/f89d3d5f-fd55-407b-b420-cd2b92151f82)



__4. Регистрация и авторизация пользователей__

![image](https://github.com/2Vladimir2/lab_5_6_PHP/assets/159247721/fe6c9173-a4b8-4d61-892f-2897cc7f29bc)


![image](https://github.com/2Vladimir2/lab_5_6_PHP/assets/159247721/f271368f-a243-4870-be8a-e1642d6c133b)




## Список использованных источников

https://www.php.net/manual/ru/function.file-put-contents.php

https://www.php.net/manual/ru/function.md5

https://www.php.net/manual/ru/function.http-response-code.php

https://www.php.net/manual/ru/function.file

https://www.php.net/manual/ru/function.header
