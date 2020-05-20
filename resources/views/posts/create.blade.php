<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="{{route('posts.store')}}" method="post">
      @csrf
      @method('POST')
      <div class="">
        <label for="title">Titolo</label>
          <input type="text" placeholder="Inserisci il titolo" name="title">
      </div>
      <div class="">
        <label for="title">Testo post</label>
        <textarea name="body" rows="8" cols="80" placeholder="Inserisci il testo del post"></textarea>
      </div>
      <div class="">
        <label for="title">Autore</label>
        <input type="text" name="author" placeholder="Inserisci nome autore">
      </div>
      <div class="">
        <label for="title">Immagine</label>
        <input type="text" name="img" placeholder="Inserisci indirizzo immagine">
      </div>
      <div class="">
        <p>Pubblica</p>
        <label for="not-published">No</label>
        <input type="radio" id="not-published" name="published" value="0">
        <label for="not-published">Si</label>
        <input type="radio" id="published" name="published" value="1">
      </div>
      <div class="">
        <input type="submit" name="" value="Salva">
      </div>
    </form>
  </body>
</html>
