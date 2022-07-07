@auth
 
    @extends('product.layout')
    
    @section('top-page')
    <div class="flex-center position-ref full-height">
        <h1>商品一覧</h1>
    <!--商品一覧表示-->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>商品名</th>
                    <th>画像</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>企業名</th>
                    <th>コメント</th>
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
                <form method="POST" action="{{ route('delete',$product->id)}}" onSubmit="return checkDelete()">
                    @csrf 
                 
                    <button type="submit" class="btn btn-primary" >削除</button>
                </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!--検索機能-->
    <div class="col-md-8 col-md-offset-2">
        <div class="input-group">
            <table>
            
                <form action="{{ route('search') }}" method="GET">
                    <tr>
                
                    <td><input type="text" id="txt-search" class="form-control input-group-prepend" placeholder="キーワードを入力" name="keyword" value="@if (isset($search)) {{ $search }} @endif"></input></td>
                        <div class="form-group-sm clearfix">
                            <td><label for="formGroupExampleInput2" class="mt-3 mb-0">企業名</label><td>
                                <div class="product-info width-control">
                                    <td> <select class="content-half-width form-control-sm d-inline" id="changeSelect" name="company" onchange="entryChange2();">
                                        <option value="">未選択</option>
                                            @foreach ($companies as $company)
                                            <!--$companyでcompaniesテーブルのcompany_nameの値を取得する-->
                                            <option value="{{ $company->company_name }}">{{ $company->company_name }}</option>
                                            @endforeach
                                        </select>
                                </div></td>
                        </div>
                        <span class="input-group-btn input-group-append">
                            <td><input type="submit" id="btn-search" class="btn btn-primary" value="検索"><i class="fas fa-search"></i> </input></td>
                        </span>
                
                        <div class="clearfix">
                        <td><button>
                            <a href="{{ route('product') }}" class="text-black">
                               クリア
                            </a>
                            </button></td>
                        </div>
                    </tr>
                </form>
            </table>
        </div>
    </div>
    @endsection

@endauth


