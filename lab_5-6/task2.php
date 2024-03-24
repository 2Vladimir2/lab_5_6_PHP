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