<!DOCTYPE HTML>

<html lang="ja">
<html>
<head>
    <title>商品一覧</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="/js/app.js" defer></script>
</head>
<body>
    <header>
      @include('product.header')
    </header>
    @auth
    <div class="container">
        @yield('top-page')
    </div>

    

    <script>
        function checkDelete(){
            if(window.confirm('削除してもよろしいですか？')){
                return true;
            }else{
                return falese;
            }
        }
    </script>
    
</body>
</html>

@endauth
