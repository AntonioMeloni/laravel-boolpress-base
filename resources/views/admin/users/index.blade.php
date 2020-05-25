@extends('layouts.app')
@section('content')
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th colspan="3">Azioni</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td> <a href="{{route('admin.users.edit', $user->id)}}">Modifica</a></td>
          <td> <a href="{{route('admin.users.show', $user->id)}}">Visualizza </a></td>
          <td>
            <form class="" action="{{route('admin.users.destroy', $user->id)}}" method="post">
              @method('DELETE')
              @csrf
              <input class="btn btn-danger" type="submit" value="Cancella">
            </form>
          </td>
        </tr>
      @endforeach

    </tbody>
  </table>
@endsection
