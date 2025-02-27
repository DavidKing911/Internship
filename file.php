<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PHP - Task 1</h1>
    <?php
        $str = "string";
        $bl = true;
        $num = 21;

        if (is_int($num)) {
            echo "Это число";
        } else {
            echo "Это не число";
        }
    ?>
</body>
</html>