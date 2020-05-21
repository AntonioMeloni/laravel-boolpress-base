
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
    <table class="table">
      <thead>
        <th>Titolo</th>
        <th>Autore</th>
        <th colspan="3">Azioni</th>
      </thead>
      <tbody>
        @foreach ($posts as $post)
            <tr>
              <td>{{$post->title}}</td>
              <td>Scritto da {{$post->author}}</td>
              <td><a href="{{route('posts.edit', $post->id)}}">Modifica</a></td>
              <td><a href="{{route('posts.show', $post->slug)}}">Visualizza</a></td>
              <td><form action="{{route('posts.destroy', $post->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">Elimina</button>
              </form></td>
            </tr>
        @endforeach
      </tbody>
    </table>
</body>
</html>
