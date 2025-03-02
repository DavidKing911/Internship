<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>PHP - Task 2</h1>
    <?php
        $arrNum = [7, 2, 9, 4, 1, 2, 12, 5, 38, 3];
        $tempNum;

        for ($i = 0; $i < count($arrNum) - 1; $i++) {
            for ($j = $i + 1; $j < count($arrNum); $j++) {
                if ($arrNum[$i] > $arrNum[$j]) {
                    $tempNum = $arrNum[$i];
                    $arrNum[$i] = $arrNum[$j];
                    $arrNum[$j] = $tempNum;
                }
            }
        }

        print_r($arrNum);
    ?>
</body>
</html>