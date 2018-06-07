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
	   <!-- Log out -->
	   <form method="post" action="/logout">
		   
		{{ csrf_field() }}
		   <button type="submit">logout</button>
	   </form>
	   
	   {{ __('auth.failed') }}
	   {{ __('auth.welcome', [ 'name' => "TEST"]) }}

       <main>
           @yield('content')
       </main>

	   <div>
		   <h1>List</h1>
		   <ul>
			   @yield('list')
		   </ul>
	   </div>
		
       <footer>
           @yield('footer')
       </footer>
   </body>
</html>