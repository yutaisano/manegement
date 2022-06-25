
<!DOCTYPE HTML>

<html lang="ja">
<html>
<head>
    <title>商品登録画面</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="/js/app.js" defer></script>

    
</head>
<body>
    
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <h2>商品登録</h2>
        <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
            @csrf
            <div class="form-group">
                <label for="product_name">
                    商品名
                </label>
                <input
                    id="product_name"
                    name="product_name"
                    class="form-control"
                    value="{{ old('product_name') }}"
                    type="text"
                >
                @if ($errors->has('title'))
                    <div class="text-danger">
                        {{ $errors->first('title') }}
                    </div>
                @endif
            </div>
            <div>
                <input type="file" id="img" name="img" class="form-control">
            </div>
            <div class="form-group-sm clearfix">
                        <label for="formGroupExampleInput2" class="mt-3 mb-0">商品カテゴリー</label>

                        <div class="product-info width-control">
                            <select class="content-half-width form-control-sm d-inline" id="changeSelect" name="canpany_id" onchange="entryChange2();">

                                <option value="">未選択</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->company }}">{{ $company->comapany }}</option>
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
                    value="{{ old('price') }}"
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
                    value="{{ old('stocks') }}"
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
                >{{ old('comment') }}</textarea>
                
            </div>


            <div class="mt-5">
                <a class="btn btn-secondary" href="{{ route('product') }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary">
                    登録する
                </button>
            </div>
        </form>
    </div>
</div>
    
</body>
</html>


