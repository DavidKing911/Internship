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
        $nick = "fdsgdgussddupuyoikjlddhghfg";
        
        function calculatingUniqueness($nickname) {
            $uniqueNick = "";
            for ($i = 0; $i < strlen($nickname); $i++) {
                if (str_contains(strtolower($uniqueNick), strtolower($nickname[$i])) == false) {
                    $uniqueNick .= $nickname[$i];
                }
            }
            return $uniqueNick;
        }

        $uniqNickname = calculatingUniqueness($nick);

        if (strlen($uniqNickname) % 2 == 0) {
            echo "Girl!";
        } else {
            echo "Boy!";
        }
    ?>
</form>
</body>
</html>