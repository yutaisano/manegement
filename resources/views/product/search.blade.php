@extends('product.layout')

@section('search')
@auth
<div class="container">
    <div class="flex-bottom position-ref full-height">
        <!--検索機能-->
        <div class="input-group">
            
            <form action="{{ route('search') }}" method="GET">
                <input type="text" id="txt-search" class="form-control input-group-prepend" placeholder="キーワードを入力" name="keyword" value="@if (isset($search)) {{ $search }} @endif"></input>
               

                <div class="form-group-sm clearfix">
                        <label for="formGroupExampleInput2" class="mt-3 mb-0">企業名</label>

                        <div class="product-info width-control">
                            <select class="content-half-width form-control-sm d-inline" id="changeSelect" name="company" onchange="entryChange2();">

                                <option value="">未選択</option>
                                @foreach ($companies as $company)
                                    <option value="{{ $company->company }}">{{ $company->company }}</option>
                                @endforeach
                                

                            </select>
                        </div>
                </div>
                <span class="input-group-btn input-group-append">
                    <input type="submit" id="btn-search" class="btn btn-primary" value="検索"><i class="fas fa-search"></i> </input>
                </span>
                
                <div class="clearfix">
                    <button>
                        <a href="{{ route('product') }}" class="text-black">
                            キャンセル
                        </a>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endauth
@endsection
