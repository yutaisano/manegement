@auth
 
    @extends('product.layout')
    
    @section('top-page')
    <div class="flex-center position-ref full-height">
        <h1>商品一覧</h1>
    <!--商品一覧表示-->

    @if (session('errorMessage'))
        <div class="alert alert-success text-center">
            {{ session('errorMessage') }}
        </div> 
    @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th scope="col">@sortablelink('company_id', 'ID')</th>
                    <th scope="col">@sortablelink('product_name', '商品名')</th>
                    <th scope="col">@sortablelink('img_path', '画像')</th>
                    <th scope="col">@sortablelink('price', '価格')</th>
                    <th scope="col">@sortablelink('stocks', '在庫数')</th>
                    <th scope="col">@sortablelink('company', '企業')</th>
                    <th scope="col">@sortablelink('comment', 'コメント')</th>
                </tr>
            </thead>
            <tbody>
            <!--コントローラで$productsに代入したテーブルデータを$productで順々に表示-->
            @foreach($products as $product)
            <tr>
                <td><a href="{{ route('detail', ['id'=>$product->id]) }}" class="btn btn-primary">詳細</a></td>
                
                
                <td>{{ $product->id }}</td> 
                <td>{{ $product->product_name }}</td> 
                <td><img src="{{ asset('/storage/'. $product->img_path) }}" width=100 height=100></td> 
                <!--<td>{{ $product->img }}</td>-->
                <td>{{ $product->price }}</td>
                <td>{{ $product->stocks }}</td>
                <td>{{ $product->company }}</td>
                <td>{{ $product->comment }}</td>
                <td>
                    <button type="button" class="btn btn-primary" onclick="location.href='{{ route('edit', ['id'=>$product->id]) }}'">
                    編集
                    </button>
                </td>

                <td>
                    <form method="post" action="{{ route('delete',$product->id)}}" id="delete-id" onSubmit="return checkDelete()">        
                    @csrf
                        <button type="button" class="btn btn-primary" id="delete-btn">削除</button>
                        <input type="hidden" value="{{$product->id}}" class="product-id">
                        
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <table id="showList"></table>
        <script src="{{ asset('/js/delete.js') }}"></script>
        <table id="search_result"></table>
    </div>
    <!--検索機能-->
    <div class="col-md-8 col-md-offset-2">
        <div class="input-group">
            <table>
            
                <form action="{{ route('search') }}" method="GET">
                    <tr>
                    <!--value="@if (isset($search)) {{ $search }} @endif"←ここで入力されたキーワードを保持する-->
                    <td><input type="text" id="txt-search" class="form-control input-group-prepend" placeholder="キーワードを入力" name="keyword" value="@if (isset($search)) {{ $search }} @endif"></input></td>
                        <div class="form-group-sm clearfix">
                            <td><label for="formGroupExampleInput2" class="mt-3 mb-0">企業名</label><td>
                                <div class="product-info width-control">
                                    <td> 
                                        <select class="content-half-width form-control-sm d-inline" id="changeSelect" name="company" onchange="entryChange2();">
                                            <option value="">未選択</option>
                                                @foreach ($companies as $company)
                                                <!--$companyでcompaniesテーブルのcompany_nameの値を取得する-->
                                                <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                                                @endforeach
                                        </select>
                                </div>
                            </td>
                        </div>
                        <span class="input-group-btn input-group-append">
                            <td><input type="button" id="btn-search" class="btn btn-primary" value="検索"><i class="fas fa-search"></i> </input></td>
                        </span>
                
                        <div class="clearfix">
                        <td><button>
                            <a href="{{ route('product') }}" class="text-black">
                               クリア
                            </a>
                            </button></td>
                        </div>
                    </tr>
                    <tr>
                        <td><input type="text" id="lowLimitPrice" class="form-control input-group-prepend" placeholder="下限価格を入力" name="lowLimitPrice" value="@if (isset($search)) {{ $search }} @endif"></input></td>
                        <td><input type="text" id="upLimitPrice" class="form-control input-group-prepend" placeholder="上限価格を入力" name="upLimitPrice" value="@if (isset($search)) {{ $search }} @endif"></input></td>
                    </tr>
                    <tr>
                        <td><input type="text" id="lowLimitStock" class="form-control input-group-prepend" placeholder="在庫下限を入力" name="lowLimitStock" value="@if (isset($search)) {{ $search }} @endif"></input></td>
                        <td><input type="text" id="upLimitStock" class="form-control input-group-prepend" placeholder="在庫上限を入力" name="upLimitStock" value="@if (isset($search)) {{ $search }} @endif"></input></td>
                    </tr>
                    
                </form>
            </table>
            <script src="{{ asset('/js/search.js') }}"></script>
            
        </div>
        <!--検索結果を表示-->

        <div>
            <table id="search_result"></table>
        </div>
    </div>
    @endsection

@endauth


