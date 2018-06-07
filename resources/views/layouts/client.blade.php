<!doctype html>
<html lang="{{ app()->getLocale() }}">
   <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">

       <title>Inscription</title>
   </head>
   <body>
       <h2>Page pour les clients</h2>

	   {{ __('auth.failed') }}
	   {{ __('auth.welcome', [ 'name' => "TEST"]) }}

       <main>
           @yield('content')
       </main>


       <footer>
           @yield('footer')
       </footer>
   </body>
</html>