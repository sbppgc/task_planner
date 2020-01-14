@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Performer
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
      <form method="post" action="{{ route('performer.update', $performer->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Имя:</label>
          <input type="text" class="form-control" name="name" value={{ $performer->name }} />
        </div>
        <div class="form-group">
          <label for="position">Должность:</label>
          <input type="text" class="form-control" name="position" value={{ $performer->position }} />
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
      </form>
  </div>
</div>
@endsection
