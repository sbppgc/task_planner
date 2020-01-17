@extends('dlg_layout')

@section('content')
<div class="row">
  <div class="col">
      <form method="post" data-method="POST" action="{{ route('task.store') }}">
        <div class="form-group">
          <label for="name">Название:</label>
          <input type="text" class="form-control" id="name" name="name" required />
        </div>
        <div class="form-group">
          <label for="id_performer">Исполнитель:</label>
          <select class="form-control" id="id_performer" name="id_performer" required>
            @foreach($performers as $performer)
              <option value="{{ $performer->id }}">{{ $performer->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="status">Статус:</label>
          <select class="form-control" id="status" name="status" required>
            <option value="open">Открыта</option>
            <option value="in_progress">В работе</option>
            <option value="complete">Завершена</option>
          </select>
        </div>
        <div class="form-group">
          <label for="description">Описание:</label>
          <textarea type="text" class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="button" class="btn btn-danger btn-block" data-purpose='cancel'>Отмена</button>
        <button type="submit" class="btn btn-primary btn-block" data-purpose='submit'>Добавить</button>

      </form>
  </div>
</div>
@endsection
