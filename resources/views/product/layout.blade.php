<!DOCTYPE HTML>

<html lang="ja">
<html>
<head>
    <title>商品一覧</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js">
</head>
<body>
    <header>
      @include('product.header')
    </header>
    @auth
    <div class="container">
        @yield('top-page')
        
    </div>

    

    
    <script src="{{ asset('/js/message.js') }}"></script>
    <script src="{{ asset('/js/buyMessage.js') }}"></script>

    
</body>
</html>

@endauth
