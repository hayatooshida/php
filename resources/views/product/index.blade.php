@extends('layouts.app')

@section('content')
     
　　 <form method="GET" action="/">
　　      
　　　　   <p><input type="text" name="keyword">←商品名で検索できます</p>
　　　　    <input type="submit" value="商品検索">
　　　　
　 　</form>
　     　
    <div class="container">
        <div class="row justify-content-left">
            @foreach ($products as $product)
            
            <div class="col-md-4 mb-2">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('product.show', $product->id) }}" class="col-lg-4 col-md-6">
                        <div><img src="images/{{ $product->image }}"></div>
                        </a>
                        
                    </div>
                    <div class="card-body">
                        {{ $product->name }}
                    </div>
                    <div class="card-body">
                        {{ $product->description }}
                    </div>
                    <div class="card-body">
                        {{ $product->price }}円
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
@endsection
