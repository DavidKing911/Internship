<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
</head>
<body>
    <form action="/responseAdd" method="GET">
        <label>Имя:</label>
        <input name="name" type="text"></br></br>
        <label>Возраст:</label>
        <input name="age" type="text"></br></br>
        <label>Пол:</label>
        <input name="gender" type="text"></br></br>
        <label>Текст вашего поста:</label></br>
        <textarea name="post" type="text"></textarea></br></br>
        <input value="Отправить" type="submit">
    </form>
</body>
</html>