@extends('dlg_layout')

@section('content')
<div class="row">
  <div class="col">
      <form method="post" data-method="PATCH" action="{{ route('task.update', $task->id) }}">
        <div class="form-group">
          <label for="name">Название:</label>
          <input type="text" class="form-control" name="name" value="{{ $task->name }}" />
        </div>
        <div class="form-group">
          <label for="performer_id">Исполнитель:</label>
          <select class="form-control" id="performer_id" name="performer_id" required>
            @foreach($performers as $performer)
              <option value="{{ $performer->id }}" {{ $performer->id == $task->performer_id ? 'selected' : ''}}>{{ $performer->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="status">Статус:</label>
          <select class="form-control" id="status" name="status" required>
            <option value="open" @if($task->status == 'open') selected @endif>{{__('statuses.open')}}</option>
            <option value="in_progress" @if($task->status == 'in_progress') selected @endif>{{__('statuses.in_progress')}}</option>
            <option value="complete" @if($task->status == 'complete') selected @endif>{{__('statuses.complete')}}</option>
          </select>
        </div>
        <div class="form-group">
          <label for="description">Описание:</label>
          <textarea type="text" class="form-control" id="description" name="description">{{ $task->description }}</textarea>
        </div>
        <button type="button" class="btn btn-danger btn-block" data-purpose='cancel'>Отмена</button>
        <button type="submit" class="btn btn-primary btn-block" data-purpose='submit'>Сохранить</button>
      </form>
  </div>
</div>
@endsection
