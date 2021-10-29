@extends('layouts.app')

@section('content')

    <h1>新規作成ページ</h1>

    <form enctype="multipart/form-data" action="{{ url('products') }}" method="POST" class="form-horizontal">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name" class="col-sm-3 control-label">商品名</label> 
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="price" class="col-sm-3 control-label">商品価格</label> 
                <input type="text" name="price" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="description" class="col-sm-3 control-label">商品説明</label> 
                <input type="text" name="description" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label>画像</label>
                <input type="file" name="image">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </div>
    </form>
@endsection