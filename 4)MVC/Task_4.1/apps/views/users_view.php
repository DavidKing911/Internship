<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MVC</title>
    </head>
    <body>
        <br>
            <?php 
                if ( !empty($users) )
                {	
                    foreach ($users as $user) {
                        echo "Name - " . $user[1] . ", Age - " . $user[3] . ", Gender - " . $user[5] . "<br>";
                    }
                } else {
                    echo '<p>В базе данных нет никаких пользователей</p>';
                }
            ?>
            </br>
            <a href="/Task_4.1/index.php">Вернуться на главную</a>
        </p>
    </body>
</html>