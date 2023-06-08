<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('data-mobile', function () {
    $accessory = DB::table('accessory')->get();

    return view('viewajax', ['accessory' => $accessory]);

});

Route::get('mobile', function () {
    return view('hien-thi-mobile');
});


Route::get('function', function () {
    $data = DB::table('migrations')->where('id', 1)->first();

    return view('choose-function', ['data' => $data]);
});


Route::post('get-data-for-selected', function (Request $request) {
    $id = $request->id;
    $data = DB::table('migrations')->where('id', $id)->first();
    echo $data->migration;
});


Route::get('crawl-tgdd', function () {
    // get DOM from URL or file
    $html = file_get_html('https://www.thegioididong.com/dtdd');

    $data = [];

    foreach($html->find('.listproduct h3') as $key => $e) {
        $data[$key]['name'] = trim($e->innertext);
    }

    foreach($html->find('.listproduct img.thumb') as $key => $e) {
        if (empty($e->{"data-src"})) {
            $data[$key]['image'] = $e->src;
        } else {
            $data[$key]['image'] = $e->{"data-src"};
        }
    }

    $stt = 0;
    foreach($html->find('.listproduct strong.price') as $key => $e) {
        if ($e->attr["class"] != "price twoprice")  {
            $price = str_replace([".", "&#x20AB;"], "", $e->innertext);
            $data[$stt]['price'] = $price;
            $stt++;
        }
    }
});
