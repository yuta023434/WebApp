<?php

function getGoodsList()
{
    $data = DB::table('t_goods')->paginate(10);
    
    return $data;
}

function getGoods($un_id)
{
    $data = DB::table('t_goods')->where('un_id',$un_id)->first();
    
    return $data;
}
