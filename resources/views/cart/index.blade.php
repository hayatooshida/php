@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach ($cartitems as $cartitem)
                       
                        <div class="card-header">
                            <div><img src="/images/{{ $cartitem->image }}"></div>
                            <a href="/item/{{ $cartitem->item_id }}">{{ $cartitem->name }}</a>
                        </div>
                        <div class="card-body">
                            <div>
                                {{ $cartitem->price }}円
                            </div>
                            <div>
                                {{ $cartitem->quantity }}個
                            </div>
                            <div>
                                {{$cartitem->product->id }}商品id
                            </div>
                            <div>
                                ¥{{$cartitem->quantity * $cartitem->price}}
                                <form method="POST" action="/cartitem/{{ $cartitem->id }}">
                                 @method('DELETE')
                                 @csrf
                                 <button type="submit" class="btn btn-danger ml-1">カートから削除する</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        小計
                    </div>
                    <div class="card-body">
                        {{ $subtotal }}円
                    </div>
                     
                  {!! link_to_route('cart.checkout', '購入する',[], ['class' => 'btn btn-success']) !!}
                 
                </div>
            </div>
            
        </div>
    </div>
@endsection
