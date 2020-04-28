<?php

/*******************************************
 * 商品情報を一覧を取得する
 *******************************************/
function getGoodsList($search_options = null)
{
    $params = array();

    if($search_options != null)
    {
        $sql = " delete_flg = 0 ";

        //商品番号
        if(array_key_exists('goods_number',$search_options) && $search_options['goods_number'] != "" )
        {
            $sql .= "AND goods_number LIKE ? ";
            $params[] = "%".$search_options['goods_number']."%"; 
        }

        //商品名
        if(array_key_exists('goods_id',$search_options) && $search_options['goods_id'] != "" )
        {
            $sql .= "AND id = ? ";
            $params[] = $search_options['goods_id'];
        }

        //金額(以下)
        if(array_key_exists('min_price',$search_options) && $search_options['min_price'] != "" )
        {
            $sql .= "AND goods_price >= ? ";
            $params[] = $search_options['min_price'];
        }

        //金額(以上)
        if(array_key_exists('max_price',$search_options) && $search_options['max_price'] != "" )
        {
            $sql .= "AND goods_price <= ? ";
            $params[] = $search_options['max_price'];
        }

        //更新日時(開始)
        if(array_key_exists('s_up_date',$search_options) && $search_options['s_up_date'] != "" )
        {
            $sql .= "AND Date(up_date) >= ? ";
            $params[] = $search_options['s_up_date'];
        }
        
        //更新日時(終了)
        if(array_key_exists('e_up_date',$search_options) && $search_options['e_up_date'] != "" )
        {
            $sql .= "AND Date(up_date) <= ? ";
            $params[] = $search_options['e_up_date'];
        }

        //追加日時(開始)
        if(array_key_exists('s_ins_date',$search_options) && $search_options['s_ins_date'] != "" )
        {
            $sql .= "AND Date(ins_date) >= ? ";
            $params[] = $search_options['s_ins_date'];
        }

        //追加日時(終了)
        if(array_key_exists('e_ins_date',$search_options) && $search_options['e_ins_date'] != "" )
        {
            $sql .= "AND Date(ins_date) <= ? ";
            $params[] = $search_options['e_ins_date'];
        }
    }

    $data = DB::table('t_goods')
    ->whereraw($sql,$params)
    ->paginate(10);
    
    return $data;
}

/*******************************************
 * 商品情報を一件取得する
 *******************************************/
function getGoods($un_id)
{
    if($un_id != "")
    {
        $data = DB::table('t_goods')
            ->where('un_id','=',$un_id)
            ->where('delete_flg','=', 0)
            ->first();
    }

    return $data;
}
