@extends('layouts.app')

@section('content')

<ul class="nav nav-tabs nav-justified mb-3">
    
    
    <li class="nav-item">
        <a href="{{ route('users.favorites',['id' => $user->id]) }} class="nav-link" }}">
            美味しかった
            <span class="badge badge-secondary">{{ $user->favorites_count }}</span>
        </a>
    </li>
</ul>
    <h1>ユーザー情報　詳細</h1>
    <ul>
        <li>{{ $user->name }}</li>
        <li>{{ $user->address }}</li>
        <li>{{ $user->postal_code }}</li>
        <li>{{ $user->phone_number }}</li>
    </ul>
{!! link_to_route('orders.index','注文履歴を見る',[],['class' => 'btn btn-warning']) !!}
@endsection
