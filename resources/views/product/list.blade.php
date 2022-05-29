@extends('layouts.app')
<!DOCTYPE HTML>

<html lang="ja">
<html>
<head>
    <title>商品一覧</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="/js/app.js" defer></script>

    
</head>
<body>
    
    <div class="flex-center position-ref full-height">
            
    <h1>商品一覧</h1>

    <!--検索機能-->

    <form method="GET" action="{{ route('product') }}">
    <input type="search" placeholder="ユーザー名を入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
    <div>
        <button type="submit">検索</button>
        <button>
            <a href="{{ route('product') }}" class="text-white">
                クリア
            </a>
        </button>
    </div>
</form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>画像</th>
                <th>商品名</th>
                <th>価格</th>
                <th>在庫数</th>
                <th>コメント</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->img }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stocks }}</td>
                <td>{{ $product->comment }}</td>
            </tr>
            @endforeach
        </tbody>



    </table>
    </div>
    
</body>
</html>


