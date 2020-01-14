@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Performer
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
      <form method="post" action="{{ route('performer.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Имя:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="position">Должность:</label>
              <input type="text" class="form-control" name="position"/>
          </div>
          <button type="submit" class="btn btn-primary">Добавить</button>
      </form>
  </div>
</div>
@endsection
