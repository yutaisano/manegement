<!DOCTYPE HTML>

<html lang="ja">
<html>
    <head>
        <title>商品詳細</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="/js/app.js" defer></script>
    
    </head>


<body>
    <header>
      @include('product.header')
    </header>
    @auth
    <div class="flex-center position-ref full-height">
            
        <h1>詳細画面</h1>
            <div class="clearfix">
                <button>
                    <a href="{{ route('product') }}" class="text-black">一覧に戻る</a>
                </button>
            </div>
   


    <!--商品詳細表示-->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>商品名</th>
                    <th>画像</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>企業名</th>
                    <th>コメント</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td> 
                    <td>{{ $product->product_name }}</td>  
                    <td><img src="{{ asset('/storage/'. $product->img_path) }}" width=100 height=100></td> 
                    
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stocks }}</td>
                    <td>{{ $product->company }}</td>
                    <td>{{ $product->comment }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" onclick="location.href='{{ route('edit', ['id'=>$product->id]) }}'">
                            編集
                        </button>
                    </td>
                </tr>
                 @endforeach
            </tbody>


        <!--検索結果を表示する-->

        </table>
    </div>
    @endauth
</body>
</html>