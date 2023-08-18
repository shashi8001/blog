<!DOCTYPE html>

<link rel="stylesheet" href="/app.css">
<script src="/app.js"></script>

<title>My Blog</title>

<body>

    <article>

        <h1>
            {!!$post->title!!}
        </h1>
        <p>
            Posted by <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
        </p>
        <div>
            <p>{!!$post->body!!}</p>
        </div>

    </article>

    <a href="/">Go Back</a>


</body>