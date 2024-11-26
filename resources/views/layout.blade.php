<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ $_APP_NAME }}</title>
  @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar">
  <div class="container">
    <div class="navbar-brand">
      <a class="navbar-item" href="/">
        <div class="circle">EW</div>
      </a>

      <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbar">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>

    <div id="navbar" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="/">
          {{ __("Home") }}
        </a>
        <a class="navbar-item" href="{{ route('projects') }}">
          {{ __("Meine Projekte") }}
        </a>
      </div>
    </div>
  </div>
</nav>
<section class="section">
  <div class="container">
    {!! $html !!}
  </div>
</section>
</body>
</html>
