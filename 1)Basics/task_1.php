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
        $arr = ['Egor', 'Nikita','Vlad','Egor','Petr'];
        $subString = 'Egor';
        $newArrA = [];
        $newArrB = [];
        
        for ($i = 0; $i < count($arr); $i++) {
            if ($arr[$i] == $subString) {
                $newArrA[] = $arr[$i];
            } else {
                $newArrB[] = $arr[$i];
            }
        }

        print_r($newArrA);
        print_r($newArrB);
    ?>
</body>
</html>