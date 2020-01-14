@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Название</td>
          <td>Исполнитель</td>
          <td>Статус</td>
          <td>Описание</td>
          <td>действия</td>
        </tr>
    </thead>
    <tbody>
        @foreach($rows as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->id_performer}}</td>
            <td>{{$row->status}}</td>
            <td>{{$row->description}}</td>
            <td><a href="{{ route('task.edit',$row->id)}}" class="btn btn-primary">Редактировать</a></td>
            <td>
                <form action="{{ route('task.destroy', $row->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
