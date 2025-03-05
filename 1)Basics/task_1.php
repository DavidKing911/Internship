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
        $arr = ["Egordf", "Nikita","Vlad","Egor","Petr", "asdfegorsdf"];
        $subString = "Egor";
        $newArrA = [];
        $newArrB = [];
        
        for ($i = 0; $i < count($arr); $i++) {
            if (str_contains(strtolower($arr[$i]), strtolower($subString))) {
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