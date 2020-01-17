@extends('layout')

@section('content')

<div class="row text-center">
  <div class="col">
    <h1>Исполнители</h1>
  </div>
</div>


<div class="row">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  @if($rows->count() > 0)
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
            <td>{{$row->performer->name}}</td>
            <td>{{$row->status}}</td>
            <td>{{$row->description}}</td>
            <td>
                <button class="btn btn-primary" type="button" data-form-url="{{ route('task.edit',$row->id)}}" data-dlg-title="Редактировать задачу">Редактировать</button>
                <button class="btn btn-danger" type="button" data-del-url="{{ route('task.destroy', $row->id)}}" data-confirm-text="Точно удалить?">Удалить</button>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  @else
      <p>Задач пока нет</p>
  @endif

</div>
<div class="row text-right">
  <div class="col">
    <button type="button" class="btn btn-primary" data-form-url="{{ route('task.create')}}" data-dlg-title="Добавить задачу">Добавить</button>
  </div>
</div>

<div style="display: none" id="resultBox">
  <div id="resultBoxMsg"></div>
  <button type="button" id="resultBoxCloseBtn" class="btn btn-info btn-block">OK</button>
</div>
@endsection
