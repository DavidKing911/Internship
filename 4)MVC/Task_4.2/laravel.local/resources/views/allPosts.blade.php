<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>All Posts</title>
    </head>
    <body>
        @foreach ($posts as $post)
            <p>Name - {{ $post->name }}, Age - {{ $post->age }}, Gender - {{ $post->gender }}, Post - {{ $post->post }}</p>
        @endforeach
        <a href="/">Вернуться на главную</a>
    </body>
</html>