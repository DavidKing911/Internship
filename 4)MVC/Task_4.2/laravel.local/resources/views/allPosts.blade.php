<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>All Posts</title>
    </head>
    <body>
        @foreach ($posts as $post)
            <p><b>Name</b> - {{ $post->name }}, <b>Age</b> - {{ $post->age }}, <b>Gender</b> - {{ $post->gender }}, <b>Post</b> - {{ $post->post }}</p>
        @endforeach
        <a href="/">Вернуться на главную</a>
    </body>
</html>