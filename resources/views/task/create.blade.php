@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Task
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('task.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Название:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="id_performer">Исполнитель:</label>
              <input type="text" class="form-control" name="id_performer"/>
          </div>
          <div class="form-group">
              <label for="status">Статус:</label>
              <input type="text" class="form-control" name="status"/>
          </div>
          <div class="form-group">
              <label for="description">Описание:</label>
              <input type="text" class="form-control" name="description"/>
          </div>
          <button type="submit" class="btn btn-primary">Добавить</button>

      </form>
  </div>
</div>
@endsection
