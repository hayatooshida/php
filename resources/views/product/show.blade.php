@extends('layouts.app')
@section('content')



<div class="container">
    <div class="product">
        
        <div class="product__content-header text-center">
            <div class="product__name">
                {{ $products->name }}
            </div>
            <div class="product__price">
                ¥{{ number_format($products->price) }}
            </div>
        </div>
        {{ $products->description }}
        
             <form method="POST" action="/cart" class="form-inline m-1">
                            {{ csrf_field() }}
                    <p>数量を入力して下さい</p>
                    
                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                    <div class="product__quantity">
                      <input type="number" name="quantity" min="1" value="1" require/>
                    </div>
                    <button type="submit" class="btn btn-primary col-sm-2">カートに入れる</button>
            </form>
            <form action="{{ url('products/'.$products->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    Delete
                </button>
            </form>
    </div>
</div>
<div><img src="/images/{{ $products->image }}"></div>

@endsection
