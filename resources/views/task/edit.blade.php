@extends('dlg_layout')

@section('content')
<div class="row">
  <div class="col">
      <form method="post" data-method="PATCH" action="{{ route('task.update', $task->id) }}">

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="fld_name">Название</span>
          </div>
          <input type="text" class="form-control" name="name" required value="{{ $task->name }}" aria-label="Название" aria-describedby="fld_name">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="performer_id">Исполнитель</label>
          </div>
          <select class="custom-select" id="performer_id" name="performer_id" required>
            @foreach($performers as $performer)
              <option value="{{ $performer->id }}" {{ $performer->id == $task->performer_id ? 'selected' : ''}}>{{ $performer->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="status">Статус</label>
          </div>
          <select class="custom-select" id="status" name="status" required>
            <option value="open" @if($task->status == 'open') selected @endif>{{__('statuses.open')}}</option>
            <option value="in_progress" @if($task->status == 'in_progress') selected @endif>{{__('statuses.in_progress')}}</option>
            <option value="complete" @if($task->status == 'complete') selected @endif>{{__('statuses.complete')}}</option>
          </select>
        </div>


        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">With textarea</span>
          </div>
          <textarea class="form-control" name="description" aria-label="With textarea">{{ $task->description }}</textarea>
        </div>

        <button type="button" class="btn btn-danger btn-block" data-purpose='cancel'>Отмена</button>
        <button type="submit" class="btn btn-primary btn-block" data-purpose='submit'>Сохранить</button>

      </form>
  </div>
</div>
@endsection
