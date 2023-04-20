<!DOCTYPE HTML>

<html lang="ja">
<html>
<head>
    <title>商品登録画面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    
</head>


<body>
    <header>
      @include('product.header')
    </header>

    @auth
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>商品情報編集</h2>
        <form method="POST" action="{{ route('update') }}" action="/upload" enctype="multipart/form-data" onSubmit="return checkStore()">
            @csrf

            <input type="hidden" name="id" value="{{ $products->id }}">
            <div class="form-group">
                <label for="product_name">
                    商品名
                </label>
                <input
                    id="product_name"
                    name="product_name"
                    class="form-control"
                    value="{{ $products->product_name }}"
                    type="text"
                >
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
        

                <label for="photo">画像ファイル:</label>
                <input type="file" class="form-control" name="img">
                
            
            <div class="form-group-sm clearfix">
                        <label for="formGroupExampleInput2" class="mt-3 mb-0">企業名</label>

                        <div class="product-info width-control">
                            <select class="content-half-width form-control-sm d-inline" id="changeSelect" name="company" onchange="entryChange2();">

                            
                                <option value="">未選択</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->company_name }}">{{ $company->company_name }}</option>
                                @endforeach
                                

                            </select>
                        </div>
                    </div>


            <div class="form-group">
                <label for="price">
                    価格
                </label>
                <input
                    id="price"
                    name="price"
                    class="form-control"
                    value="{{ $products->price }}"
                    type="text"
                >
                
            </div>


            <div class="form-group">
                <label for="stocks">
                    在庫数
                </label>
                <input
                    id="stocks"
                    name="stocks"
                    class="form-control"
                    value="{{ $products->stocks }}"
                    type="text"
                >
                
            </div>


            <div class="form-group">
                <label for="comment">
                    コメント
                </label>
                <textarea
                    id="comment"
                    name="comment"
                    class="form-control"
                    rows="4"
                >{{ $products->comment }}</textarea>
                
            </div>


            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('product') }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary" >
                    更新する
                </button>
            </div>
        </form>
    </div>
</div>

<script>
        function checkStore(){
            if(window.confirm('更新してもよろしいですか？')){
                return true;
            }else{
                return falese;
            }
        }
    </script>
    
</body>
</html>


@endauth