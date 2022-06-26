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
            @foreach($products as $product)
            <tr>
                <td><a href="{{ route('detail', ['id'=>$product->id]) }}" class="btn btn-primary">詳細</a></td>
                <td>{{ $product->id }}</td> 
                <td>{{ $product->product_name }}</td>  
                <td><img src="{{ asset('/storage/'. $product->img) }}" width=100 height=100></td> 
                <!--<td>{{ $product->img }}</td><-->
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
    @endsection

@endauth


