<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

ini_set('display_errors', 'On');
error_reporting(E_ALL);
class B{
    public static $zhang = "张";
}

class A {
    private static $sfoo = 1;
    private $ifoo = 2;
    protected $wang='王';
}
$cl1 = function() {

    return self::$sfoo.B::$zhang;
};
$cl2 = function() {
    //return $this->ifoo;
    return $this->wang;
};
// 第1个参数必须是一个匿名函数
// 第2个参数必须是一个对象或null，不能为字符串等其它类型，记住匿名函数是一个对象，也可以做为第2个参数传入
//       当第1个参数，这个匿名函数中用到了$this时，得必须传入一个对象，用于代表匿名函数中的$this，如果传入null，会报错
//       当第1个参数，这个匿名函数中没有用到$this,第2个参数是一个对象也会当成null,所以这种情况都是传入null
// 总结，第2个参数与第1个参数有关系，如果第1个参数中有$this,第2个参数必须是对象，如果第1个参数中没有用到$this,就传null，传对象也当成null

// 第3个参数可以为static(默认),null(相当于static),此时第2个参数(对象)的public属性和方法是可以调用的，但private和protected的不行,
//包括静态的属性和方法也不行，会报错 Cannot access private property A::$wang
// 第3个参数除了static或null外，必须是一个完全命令空间的类名. 类名是是第2个参数这个对象的类名
// 第1上参数中没用到到$this时，第2个参数null，第1个参数如果用到了类名调用静态方法，那么第3个参数为该类名，就可以调用该类的包括private的所有属性和方法
// 如果第1个参数中用到了不止一个类,好象不支持，也就是第3个参数是第1个参数中用到的类名
//$bcl1 = Closure::bind($cl1,null, "A");
$bcl2 = Closure::bind($cl2, new A(),"A");
//echo $bcl1(), "\n";
echo $bcl2(), "\n";


$kernel->terminate($request, $response);
