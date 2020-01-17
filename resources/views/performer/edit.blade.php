@extends('dlg_layout')

@section('content')
<div class="row">
  <div class="col">
      <form method="post" data-method="PATCH" action="{{ route('performer.update', $performer->id) }}">
        <div class="form-group">
          <label for="name">Имя:</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ $performer->name }}" required />
        </div>
        <div class="form-group">
          <label for="position">Должность:</label>
          <input type="text" class="form-control" name="position" value="{{ $performer->position }}" required />
        </div>
        <button type="button" class="btn btn-danger btn-block" data-purpose='cancel'>Отмена</button>
        <button type="submit" class="btn btn-primary btn-block" data-purpose='submit'>Сохранить</button>
      </form>
  </div>
</div>
@endsection
