<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog de Samuel</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    @if (session('status'))
        <div class="status">
            {{ session('status')}}
        </div>
    @endif
    
    <div class="container">
        <h1>BLOG</h1>
        <a href="{{route('posts.create')}}">Create new post</a>
        @foreach ($usuarios as $usuario)
            <article>
                <h3>
                    <a href={{route('posts.show',$usuario->id)}}>
                    {{ $usuario -> title}}
                    </a>
                </h3>
                
            </article>
        @endforeach
    </div>
</body>
</html>