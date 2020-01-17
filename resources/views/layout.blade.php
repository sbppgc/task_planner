<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Task planner</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
  <div class="container">
    @yield('content')
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

  <script src="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.0.6/dist/jBox.all.min.js"></script>
  <link href="https://cdn.jsdelivr.net/gh/StephanWagner/jBox@v1.0.6/dist/jBox.all.min.css" rel="stylesheet">

  <script src="{{ asset('js/taskplanner.js') }}" type="text/javascript"></script>
  <link href="{{ asset('css/taskplanner.css') }}" rel="stylesheet">

</body>
</html>
