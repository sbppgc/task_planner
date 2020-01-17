@extends('dlg_layout')

@section('content')
<div class="row">
  <div class="col">
      <form method="post" data-method="PATCH" action="{{ route('performer.update', $performer->id) }}">

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="fld_name">Имя</span>
          </div>
          <input type="text" class="form-control" name="name" required value="{{ $performer->name }}" aria-label="Имя" aria-describedby="fld_name">
        </div>

        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="fld_position">Должность</span>
          </div>
          <input type="text" class="form-control" name="position" required value="{{ $performer->position }}" aria-label="Должность" aria-describedby="fld_position">
        </div>

        <button type="button" class="btn btn-danger btn-block" data-purpose='cancel'>Отмена</button>
        <button type="submit" class="btn btn-primary btn-block" data-purpose='submit'>Сохранить</button>

      </form>
  </div>
</div>
@endsection
