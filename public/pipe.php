<?php
# laravel pipeline 的简单实现，pipeline 主要用来对数据进行管道化处理，类似于拦截器，层层过滤数据
# 请求 -> 管道1 —> 管道2 -> 管道3 -> 业务逻辑 -> 后置管道 -> 返回结果
$food =new stdClass();


$middlewares = [new 早餐(), new 中餐(), new 晚餐(), new 夜宵()];
$reverse = array_reverse($middlewares);


$result = array_reduce(
        // A:参数1是一个数组
        $reverse,
        // B:参数2是一个匿名函数，它有两个参数，第一个参数为执行这个匿名函数返回的结果，第二个参数为A中的一个元素
        // A中有几个元素,B就执行几次
        // B第一次执行时，第一个参数的值是下面的C，如果没提供C，就是null
        function ($start, $handler) {
            return function ($food) use ($start, $handler) {
                return $handler->hanlde($food,$start);
            };
        },
        // C: 初始
        function () use($food) {
            $food->大米=1000;
            $food->水果=800;
            echo "今天仓库一开始有大米1000公斤，水果800公斤";
    });


$response = $result($food);

print_r($response);
print_r($food);

class 早餐
{
    function hanlde($food,$callback)
    {
        $food->大米-=15;
        $food->水果-=8;
        echo "早餐大米吃了15公斤,水果吃了8公斤\n";
        return $callback($food);
    }
}


class 中餐
{
    function hanlde($food,$callback)
    {
        $food->大米-=22;
        $food->水果-=13;
        echo "中餐大米吃了22公斤,水果吃了13公斤\n";
        return $callback($food);
    }
}


class 晚餐
{

    function hanlde($food,$callback)
    {
        $food->大米-=17;
        $food->水果-=10;
        echo "晚餐大米吃了17公斤,水果吃了10公斤\n";
        $re = $callback($food);
        $food->大米+=50;
        $food->水果+=40;
        echo "学校晚上购买了大米50公斤,水果40公斤\n";
        return $re;
    }

}


class 夜宵
{
    function hanlde($food,$callback)
    {
        $food->大米-=33;
        $food->水果-=27;
        echo "夜宵大米吃了33公斤,水果吃了27公斤，吃得有点多\n";
        return $callback($food);
    }
}