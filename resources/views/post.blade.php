<!DOCTYPE html>

<link rel="stylesheet" href="/app.css">
<script src="/app.js"></script>

<title>My Blog</title>

<body>

    <article>

        <h1>
            {{$post->title}}
        </h1>

        <div>
            {!!$post->body!!}
        </div>

    </article>

    <a href="/">Go Back</a>


</body>