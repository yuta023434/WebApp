@extends('layouts.parents')
@section('title', 'EC管理システム-確認画面-削除完了')
@section('content')
  <div class="container">
  <nav aria-label="パンくずリスト">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">商品情報一覧</li>
      <li class="breadcrumb-item">確認画面</li>
      <li class="breadcrumb-item active" aria-current="page">削除完了</li>
    </ol>
  </nav>
  {{-- 見出し --}}
  <h3 style="border-bottom: 1px solid #000;border-left: 10px solid #000;padding: 7px;">削除完了</h3>
  <a href="{{route('index')}}">商品情報一覧へ戻る</a>
  </div>
@endsection
