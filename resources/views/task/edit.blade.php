@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Task
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
      <form method="post" action="{{ route('task.update', $task->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Название:</label>
          <input type="text" class="form-control" name="name" value={{ $task->name }} />
        </div>
        <div class="form-group">
          <label for="id_performer">Исполнитель:</label>
          <input type="text" class="form-control" name="id_performer" value={{ $task->id_performer }} />
        </div>
        <div class="form-group">
          <label for="status">Статус:</label>
          <input type="text" class="form-control" name="status" value={{ $task->status }} />
        </div>
        <div class="form-group">
          <label for="description">Описание:</label>
          <input type="text" class="form-control" name="description" value={{ $task->description }} />
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
