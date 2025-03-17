<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PHP - Task 3</h1>
    <?php
        require_once('Printer.php');
        require_once('ScreenOutput.php');
        
        $printer1 = new Printer("Текст для вывода на принтер");
        $printer1->getStr();
        echo "</br>";
        $screener = new ScreenOutput("Текст для вывода на экран");
        $screener->getStr();
    ?>
</body>
</html>