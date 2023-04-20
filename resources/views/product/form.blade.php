
@auth
@extends('product.layout')


    <div class="col-md-8 col-md-offset-2">
        <h2>商品登録</h2>
        <form method="POST" action="{{ route('store') }}" action="/upload" enctype="multipart/form-data" onSubmit="return checkStore()">
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
        

                <label for="photo">画像ファイル:</label>
                <input type="file" class="form-control" name="img_path">
                
            
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
                <button type="submit" class="btn btn-primary" >
                    登録する
                </button>
            </div>
        </form>
    </div>



<script src="{{ asset('/js/register.js') }}"></script>
    

@endauth
