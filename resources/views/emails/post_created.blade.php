<!DOCTYPE html>
<html>
<head>
    <title>Новый пост создан</title>
</head>
<body>
    <h1>Новый пост: {{ $post->title }}</h1>
    <p>Вы можете прочитать его по следующей ссылке:</p>
    <a href="{{ route('posts.show', $post) }}">Читать пост</a>
</body>
</html>
