@extends('dlg_layout')

@section('content')
<div class="row">
  <div class="col">
      <form  method="post" data-method="POST" action="{{ route('performer.store') }}">

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="fld_name">Имя</span>
            </div>
            <input type="text" class="form-control" name="name" required aria-label="Имя" aria-describedby="fld_name">
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="fld_position">Должность</span>
            </div>
            <input type="text" class="form-control" name="position" required aria-label="Должность" aria-describedby="fld_position">
          </div>

          <button type="button" class="btn btn-danger btn-block" data-purpose='cancel'>Отмена</button>
          <button type="submit" class="btn btn-primary btn-block" data-purpose='submit'>Добавить</button>

      </form>
  </div>
</div>
@endsection
