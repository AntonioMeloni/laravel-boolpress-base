<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>{{$post->title}}</h2>
    <img src="{{$post->img}}" alt="">
    <p>{{$post->body}}</p>
    <p>{{$post->author}}</p>
    <small>{{$post->created_at}}</small>
  </body>
</html>
