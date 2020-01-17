@extends('layout')

@section('content')

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('task.index')}}">Задачи</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{ route('performer.index')}}">Исполнители</a>
  </li>
</ul>


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
            <td class="border-top-0">ID</td>
            <td class="border-top-0">Имя</td>
            <td class="border-top-0">Должность</td>
            <td class="border-top-0">Действия</td>
          </tr>
      </thead>
      <tbody>
          @foreach($rows as $row)
          <tr>
              <td>{{$row->id}}</td>
              <td>{{$row->name}}</td>
              <td>{{$row->position}}</td>
              <td>
                <button class="btn btn-primary" type="button" data-form-url="{{ route('performer.edit',$row->id)}}" data-dlg-title="Редактировать исполнителя">Редактировать</button>
                <button class="btn btn-danger" type="button" data-del-url="{{ route('performer.destroy', $row->id)}}" data-confirm-text="Точно удалить?">Удалить</button>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
    @else
      <p>Исполнителей пока нет</p>
    @endif

</div>
<div class="row text-right">
  <div class="col">
    <button type="button" class="btn btn-primary" data-form-url="{{ route('performer.create')}}" data-dlg-title="Добавить исполнителя">Добавить</button>
  </div>
</div>

<div style="display: none" id="resultBox">
  <div id="resultBoxMsg"></div>
  <button type="button" id="resultBoxCloseBtn" class="btn btn-info btn-block">OK</button>
</div>

@endsection
