<?php

namespace App\Http\Controllers\Goods\Delete;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class GoodsDeleteDoController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke()
    {
        echo 'きてる<br>';
        echo 'あああ';
        exit;
        return view('goods.delete.do');
    }
}
