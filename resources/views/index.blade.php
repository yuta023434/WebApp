@extends('layouts.parents')
@section('title', 'EC管理システム')
@section('content')

  <div class="container">
  {{-- 検索条件テーブル --}}
  <h3 style="border-bottom: 1px solid #000;border-left: 10px solid #000;padding: 7px;margin-top:10px;">商品情報一覧</h3>
  <div id="contents_search">
    <span>GitTest3</span>
    <form>
      <table class="table table_border_radius">
        <thead>
          <tr>
            <th colspan="6">検索条件</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>商品番号</th>
            <td colspan="2"><input type="text" vlaue=""></td>
            <th>商品名</th><!-- 入力でセレクトボックス絞り込み->セレクトボックスで選択させる -->
            <td colspan="2"><input type="text" vlaue=""></td>
          </tr>
            <th>金額</th>
            <td colspan="5"><input type="text" vlaue="">&nbsp;以上&nbsp;～&nbsp;<input type="text" vlaue="">&nbsp;以下</td>
          </tr>
          <tr>
          <tr>
          <th>更新日時</th>
            <td colspan="5"><input id="s_up_date" type="text" >～&nbsp;<input id="e_up_date" type="text"></td>
          </tr>
          <tr>
            <th>追加日時</th>
            <td colspan="5"><input id="s_ins_date" type="text">～&nbsp;<input id="e_ins_date" type="text"></td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="6" class="t_foot">
              <input type="submit" style="padding:0px 24px 0px 24px;" value="検索">
              <input type="reset" value="リセット">
            </th>
          </tr>
        </tfoot>
    </table>
    </form>
  </div>
<a href="{{ route('goods_add') }}">新規登録</a>
{{ $goods_list->links() }}
 {{-- 商品情報一覧 --}}
 <form>
  <table class="table table-hover">
  <thead>
    <tr>
      <th>商品番号</th>
      <th>商品名</th>
      <th>金額</th>
      <th>個数</th>
      <th>更新日付</th>
      <th>追加日付</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($goods_list as $value)
    <tr>

        <td>{{$value->goods_number}}</td>
        <td>{{$value->goods_name}}</td>
        <td>{{$value->goods_price}}</td>
        <td>{{$value->goods_stock}}</td>
        <td>{{date('Y年m月d日',strtotime($value->up_date))}}</td>
        <td>{{date('Y年m月d日',strtotime($value->ins_date))}}</td>
     
      <td>
      <a class="btn btn-success" href="{{route('goods_detail')}}?un_id={{$value->un_id}}" role="button">詳細</a>
      <a class="btn btn-info" href="{{route('goods_edit')}}?un_id={{$value->un_id}}" role="button">編集</a>
      <a class="btn btn-danger" href="{{route('goods_delete')}}?un_id={{$value->un_id}}" role="button">削除</a>
    </td>
    </tr>
    @endforeach
  </tbody>
  <tfoot>
</tfoot>
</table>
{{ $goods_list->links() }}
 </form>
  </div>

  @endsection
