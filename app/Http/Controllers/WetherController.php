<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class WetherController extends Controller
{
    /**
   * @OA\Get(
   *     path="/api/getwet",
   *     tags={"Yandex Wether API"},
   *     description="Получить погоду",
   *     @OA\Response(
   *         response="200",
   *         description="data"
   *     ),
   *   @OA\Parameter(
   *      name="token",
   *      in="header",
   *      required=true,
   *      @OA\Schema(
   *           type="string"
   *      )
   *   ),
   * )
   * @return \Illuminate\Http\JsonResponse
   */
    public function get() {
        $resp = Http::withHeaders(['X-Yandex-API-Key'=>'2cfff7d2-0e4a-4c58-984a-378f79d368e6'])
                ->get('https://api.weather.yandex.ru/v2/forecast',['lat'=>"52.6031" , 'lon'=>"39.5708", 'lang'=>'ru_RU']);
        $resp = json_decode($resp->getBody()); 
        $resp=$resp->fact; $wh = new ProductService;
        return $wh->getFrom($resp);    
    }
}
