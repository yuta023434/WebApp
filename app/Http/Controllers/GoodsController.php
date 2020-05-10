<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Http\Requests\GoodsRequest;
use Illuminate\Routing\Controller as BaseController;


class GoodsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(GoodsRequest $request)
    {  
        echo 'goods_list';
        
        //検索オプションの作成
        $search_options = array(
            'goods_number' => $request->goods_number,
            'goods_id'   => $request->goods_id,
            'min_price'    => $request->min_price,
            'max_price'    => $request->max_price
        ) ;

        //日付存在チェック
        if( $request->s_up_year != "" && $request->s_up_month != "" && $request->s_up_month != "" )
        {
            $search_options['s_up_date'] = $request->s_up_year.'-'.$request->s_up_month.'-'.$request->s_up_day;
        }
        if( $request->e_up_year != "" && $request->e_up_month != "" && $request->e_up_month != "" )
        {
            $search_options['e_up_date'] = $request->e_up_year.'-'.$request->e_up_month.'-'.$request->e_up_day;
        }
        if( $request->s_ins_year != "" && $request->s_ins_month != "" && $request->s_ins_month != "" )
        {
            $search_options['s_ins_date'] = $request->s_ins_year.'-'.$request->s_ins_month.'-'.$request->s_ins_day;
        }
        if( $request->e_ins_year != "" && $request->e_ins_month != "" && $request->e_ins_month != "" )
        {
            $search_options['e_ins_date'] = $request->e_ins_year.'-'.$request->e_ins_month.'-'.$request->e_ins_day;
        }
        echo '<pre>search_options';
        print_r($search_options);
        echo '</pre>';
        
        
        // //商品情報一覧取得
         $goods_list = getGoodsList($search_options);
         echo '<pre>goods_list';
         print_r($goods_list);
         echo '</pre>';
         
        
        return view('index',[
            'goods_list' => $goods_list
            ]);
    }
}
