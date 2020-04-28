@extends('layouts.parents')
@section('title', 'EC管理システム')
@section('content')

  <div class="container">
  {{-- 検索条件テーブル --}}
  <h3 style="border-bottom: 1px solid #000;border-left: 10px solid #000;padding: 7px;margin-top:10px;">商品情報一覧</h3>
  {{-- エラー表示 --}}
  @if(count($errors) > 0)
    <ul>
      @foreach ($errors->all() as $error)
        <li style="color:#FF0000;">{{ $error }}</li>
      @endforeach
    </ul>
  @endif
  <div id="contents_search">
  <form action="{{route('index')}}">
      <table class="table table_border_radius">
        <thead>
          <tr>
            <th colspan="6">検索条件</th>
          </tr>
        </thead>
        <tbody id="SearchForm">
          <tr>
            <th>商品番号</th>
            <td colspan="2"><input type="text" name="goods_number" value="{{ request()->goods_number }}"></td>
            <th>商品名</th><!-- 入力でセレクトボックス絞り込み->セレクトボックスで選択させる -->
            <td colspan="2">
              <select type="text" name="goods_id" width="360px" id="Select2Form" class="ja-select2" style="width:300px;">
                <option value="" @if(request()->goods_id == "") selected="selected" @endif></option>
                @foreach( $goods_list as $key => $value ) 
                  <option value="{{$value->id}}" @if( request()->goods_id == $value->id ) selected="selected" @endif>【商品番号:{{$value->goods_number}}】{{$value->goods_name}}</option>
                @endforeach
              </select>
            </td>
          </tr>
            <th>金額</th>
          <td colspan="5"><input type="text" name="min_price" value="{{ request()->min_price }}">&nbsp;以上&nbsp;～&nbsp;<input type="text" name="max_price" value="{{ request()->max_price }}">&nbsp;以下</td>
          <tr>
          <th>更新日時</th>
          <td colspan="5">
            <input style="width:60px;" id="s_up_year" type="text" name="s_up_year" value="{{request()->s_up_year}}">年
            <input style="width:60px;" id="s_up_month" type="text" name="s_up_month" value="{{request()->s_up_month}}" >月
            <input style="width:60px;" id="s_up_day" type="text" name="s_up_day" value="{{request()->s_up_day}}" >日
            <input  type="text" value="" id="s_up_date" style="display:none;" />
            ～&nbsp;
            <input style="width:60px;" id="e_up_year" type="text" name="e_up_year" value="{{request()->e_up_year}}" >年
            <input style="width:60px;" id="e_up_month" type="text" name="e_up_month" value="{{request()->e_up_month}}" >月
            <input style="width:60px;" id="e_up_day" type="text" name="e_up_day" value="{{request()->e_up_day}}" >日
            <input type="text" value="" id="e_up_date" style="display:none;" />
          </td>
          </tr>
          <tr>
          <th>追加日時</th>
          <td colspan="5">
            <input style="width:60px;" id="s_ins_year" type="text" name="s_ins_year" value="{{request()->s_ins_year}}" >年
            <input style="width:60px;" id="s_ins_month" type="text" name="s_ins_month" value="{{request()->s_ins_month}}" >月
            <input style="width:60px;" id="s_ins_day" type="text" name="s_ins_day" value="{{request()->s_ins_day}}" >日
            <input type="text" value=""  id="s_ins_date" style="display:none;" />
            ～&nbsp;
            <input style="width:60px;" id="e_ins_year" type="text" name="e_ins_year" value="{{request()->e_ins_year}}" >年
            <input style="width:60px;" id="e_ins_month" type="text" name="e_ins_month" value="{{request()->e_ins_month}}" >月
            <input style="width:60px;" id="e_ins_day" type="text" name="e_ins_day" value="{{request()->e_ins_day}}" >日
            <input  type="text" value="" id="e_ins_date" style="display:none;" />
          </td>
          </tr>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="6" class="t_foot">
              <input type="submit" style="padding:0px 24px 0px 24px;" value="検索">
              <input type="button" id="ClearButton" value="リセット">
            </th>
          </tr>
        </tfoot>
    </table>
    </form>
  </div>
<a href="{{ route('goods_add') }}">新規登録</a>
{{-- 商品情報一覧 --}}
@if(count($goods_list) > 0)
{{ $goods_list->appends(request()->input())->links() }}
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
    </table>
  </form>
  {{ $goods_list->appends(request()->input())->links() }}
  @else
    <p style="color:#FF0000;">商品情報がありません</p>
  @endif
  </div>
@endsection
