<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once('Check.php');
        if (!empty($_POST)) {
            $stajer = new Check($_POST['name'], $_POST['age'], $_POST['gender']);
            echo $stajer;
        }
    ?>
</body>
</html>