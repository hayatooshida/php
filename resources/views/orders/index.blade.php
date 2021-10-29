@extends('layouts.app')

@section('content')
<h1>ご注文履歴</h1>
@foreach($order as $orders)
<h2>合計金額：{{ $orders->total_price }}円
購入日時：{{ $orders->created_at }}</h2>
<h3>購入者：{{ $orders->user->name }}様</h3>
<p>住所: {{ $orders->user->address}}</p>
<p>郵便番号:{{ $orders->user->postal_code }}</p>
<p>携帯電話番号: {{ $orders->user->phone_number }}</p>
<p>{!! link_to_route('order_detail.show','注文詳細を見る',['detail' => $orders->id], ['class' => 'btn btn-info']) !!}</p>

<form method="POST" action="/order/{{ $orders->id }}">
                 @method('DELETE')
                 @csrf
    <button type="submit" class="btn btn-danger ml-1">削除する</button>
</form>
@endforeach
{{ $order->links() }}
@endsection