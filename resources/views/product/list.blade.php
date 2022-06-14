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
    <div class="input-group" >
        <form action="{{ route('search') }}" method="GET">
            <input type="text" id="txt-search" class="form-control input-group-prepend" placeholder="キーワードを入力" name="keyword" value="@if (isset($search)) {{ $search }} @endif"></input>
            <span class="input-group-btn input-group-append">
                <input type="submit" id="btn-search" class="btn btn-primary" value="検索"><i class="fas fa-search"></i> </submit>
            </span>
            <div class="clearfix">
                <button>
                    <a href="{{ route('product') }}" class="text-black">
                    クリア
                    </a>
                </button>
            </div>
        </form>
    </div>

        
        

    </form>


    <!--商品一覧表示-->
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
                <td><a href="{{ route('detail', ['id'=>$product->id]) }}" class="btn btn-primary">詳細</a></td>
            </tr>
            @endforeach
        </tbody>


        <!--検索結果を表示する-->

    </table>
    </div>
    
</body>
</html>


