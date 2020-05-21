<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="{{route('posts.update', $post->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="">
        <label for="title">Titolo</label>
          <input type="text" placeholder="Inserisci il titolo" name="title" value="{{$post->title}}">
          @error('title')
            {{$message}}
          @enderror
      </div>
      <div class="">
        <label for="title">Testo post</label>
        <textarea name="body" rows="8" cols="80" placeholder="Inserisci il testo del post">{{$post->body}}</textarea>
        @error('body')
          {{$message}}
        @enderror
      </div>
      <div class="">
        <label for="title">Autore</label>
        <input type="text" name="author" placeholder="Inserisci nome autore" value="{{$post->author}}">
        @error('author')
          {{$message}}
        @enderror
      </div>
      <div class="">
        <label for="title">Immagine</label>
        <input type="text" name="img" placeholder="Inserisci indirizzo immagine" value="{{$post->img}}">
        @error('img')
          {{$message}}
        @enderror
      </div>
      <div class="">
        <p>Pubblica</p>
        <label for="not-published">No</label>
        <input type="radio" id="not-published" name="published" value="0" {{($post->published == 0) ? 'checked' : ''}}>
        <label for="not-published">Si</label>
        <input type="radio" id="published" name="published" value="1"{{($post->published == 1) ? 'checked' : ''}}>
        @error('published')
          {{$message}}
        @enderror
      </div>
      <div class="">
        <input type="submit" name="" value="Salva">
      </div>
    </form>
  </body>
</html>
