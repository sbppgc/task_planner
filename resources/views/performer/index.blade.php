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
          <td>Имя</td>
          <td>Должность</td>
          <td>Действия</td>
        </tr>
    </thead>
    <tbody>
        @foreach($rows as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->position}}</td>
            <td><a href="{{ route('performer.edit',$row->id)}}" class="btn btn-primary">Редактировать</a></td>
            <td>
                <button class="btn btn-danger" type="submit" del-url="{{ route('performer.destroy', $row->id)}}">Удалить</button>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection
