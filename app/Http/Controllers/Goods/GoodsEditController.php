<?php

namespace App\Http\Controllers\Goods;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class GoodsEditController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke(Request $request)
    {
        echo 'きてる<br>';

        //初回アクセスではないとき
        if($request->first_flg)
        {
            $goods_data = (object) array();

            $goods_data->goods_number = $request->goods_number;
            $goods_data->goods_name = $request->goods_name;
            $goods_data->goods_price = $request->goods_price;
            $goods_data->goods_stock = $request->goods_stock;
            $goods_data->intro_txt = $request->intro_txt;
            $goods_data->disp_flg = $request->disp_flg; 
        }
        else
        {
            $goods_data = getGoods($request->un_id);
        }

        echo '<pre>';
        print_r($goods_data);
        echo '</pre>';
        
        return view('goods.edit',[
            'goods_data' => $goods_data,
        ]);
    }
}
