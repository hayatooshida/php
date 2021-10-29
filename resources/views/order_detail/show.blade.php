@extends('layouts.app')

@section('content')
<h1>ご注文履歴 詳細</h1>
@foreach($detail as $details)

<p><img src="/images/{{ $details->image }}"></p>
<p>商品名： {{ $details->name }}</p>
<p>商品価格：{{ $details->price }}円</p>
<p>購入数量：{{ $details->quantity }}個</p>
<p>この商品のお支払金額：{{ $details->price * $details->quantity }}円</p>

@endforeach
@endsection