<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProducts()
    {
        $result = [
            ["id" => 1,
                "title" => "LED动感演示道具火随锅控",
                "views" => 80
            ],
            ["id" => 2,
                "title" => "定制型LED常亮发光标识牌",
                "views" => 246
            ],
            ["id" => 3,
                "title" => "Led常规卡布动感灯箱",
                "views" => 481
            ],
        ];
        return view('product/list-products',["results"=>$result]);
    }
}
