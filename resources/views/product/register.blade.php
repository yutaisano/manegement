
<!DOCTYPE HTML>

<html lang="ja">
<html>
<head>
    <title>商品登録画面</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="/js/app.js" defer></script>

    
</head>
<body>
    
    <div class="flex-center position-ref full-height">
            
        <h1>商品登録画面</h1>
        <div class="clearfix">
            <button>
                <a href="{{ route('product') }}" class="text-black">
                    商品一覧に戻る
                </a>
            </button>
        </div>


        <!--商品登録-->
        <div>
            <form action="{{ route('ProductRegister') }}" method="GET">
                <!--商品名-->
                <input type="text" id="txt-search" class="form-control input-group-prepend" placeholder="商品名" name="product_name" value="@if (isset($productRegister)) {{ $prodcut_name }} @endif"></input>
                <!--価格-->
                <input type="text" id="txt-search" class="form-control input-group-prepend" placeholder="価格" name="product_price" value="@if (isset($productRegister)) {{ $prodcut_price }} @endif"></input>
                <!--在庫数-->
                <input type="text" id="txt-search" class="form-control input-group-prepend" placeholder="在庫数" name="product_stock" value="@if (isset($productRegister)) {{ $prodcut_stock }} @endif"></input>

                <input type="textarea" id="txt-search" class="form-control input-group-prepend" placeholder="商品説明" name="product_stock" value="@if (isset($productRegister)) {{ $prodcut_comment }} @endif"></input>

                <!--登録ボタン-->
                <input type="submit" id="btn-search" class="btn btn-primary" value="商品登録"><i class="fas fa-search"></i> </input>

            </form>
        </div>


                
    </div>
    
</body>
</html>


