<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Post</title>
</head>
<body>
    <style>
        .alert {color: red;}
    </style>

    @if ($errors->any() || $modelErrors)
        <div class="alert alert-danger">
            <ul>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @else
                    @foreach ($modelErrors as $modelError)
                        <li>{{ $modelError }}</li>
                    @endforeach
                @endif
            </ul>
        </div>
    @endif

    <form action="/posts/add" method="POST">
        @csrf
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