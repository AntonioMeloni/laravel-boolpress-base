

@foreach ($posts as $post)
  <h2>{{$post->title}}</h2>
  <img src="{{$post->img}}" alt="">
  <p>{{$post->body}}</p>
  <p>{{$post->author}}</p>
  <small>{{$post->created_at}}</small>
@endforeach
