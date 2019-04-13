<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>P1 - Luiz Resplande</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="col-md-12">
                <a class="navbar-brand" href="/pagamento">
                  Pagamentos
                </a>
               
                
                 <a class="navbar-brand" href="/categoria">
                  Categorias
                </a>
             
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
<p class="alert alert-success">{{ Session::get('message') }}</p>
@endif

 @if(Session::has('error'))
<p class="alert alert-danger">{{ Session::get('error') }}</p>
@endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div></div></div>
<div class="container">
            @yield('content')
            </div>
            
            
            
              
            
            
        </main>
    </div>
    
     <script>
       
       $("#my-form").conversationalForm({
        
});
       
   </script>
     <script src="https://code.jquery.com/jquery-3.4.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js" ></script>
    <script src=" {{ asset('js/form.conversation.js') }}" ></script>
  
 
</body>
</html>
