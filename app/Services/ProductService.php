<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class ProductService
{
    public function getIn($products)
    {
        if (!(Cache::get('key'))) {
            $pul = array();
            foreach ($products as $item) {
                $mas = [
                    'id' => $item->id,
                    'name' => $item->name,
                    'property' => [
                        'price' => $item->price,
                        'color' => $item->color,
                        'desc' => $item->desc
                    ]
                ];
                array_push($pul, $mas);
            }
            Cache::put('key', $pul, 600);
        } else {
            $pul = Cache::get('key');
        }
        return json_encode($pul);
    }
    public function getInCart($products)
    {

        $pul = array();
        foreach ($products as $item) {
            $mas = [
                'id' => $item->id,
                'name' => $item->name,
                'property' => [
                    'price' => $item->price,
                    'color' => $item->color,
                    'desc' => $item->desc
                ]
            ];
            array_push($pul, $mas);
        }



        return json_encode($pul);
    }
    public function addBasket($request, $cart)
    {
        $cart->products()->attach($request->input('id'));
        return;
    }
    public function sumPrice($cart)
    {
        $itogo = null;
        foreach ($cart as $val) {
            $itogo += $val->price;
        };
        $itogo = 'Оплачено ' . $itogo . ' $';
        return $itogo;
    }
    public function getProductFromCart($cart)
    {
        return $cart->products()->get();
    }
    public function getCartHistory($carts)
    {
        $pul = array();
        foreach ($carts as $val) {
            $pul[] = $val->products()->get();
        }
        return $pul;
    }
    public function getFrom($resp)
    {
        return "Температура: " . $resp->temp . "°C (ощущается как " . $resp->feels_like . "°C)<br>"
            . $resp->condition . "<br>"
            . "Скорость ветра: " . $resp->wind_speed . " м/с.<br>"
            . "Скорость порывов ветра:" . $resp->wind_gust . " м/с<br>"
            . "Направление ветра: " . $resp->wind_dir . "<br>"
            . "Давление: " . $resp->pressure_mm . " мм рт. ст.(" . $resp->pressure_mm . "гПа)<br>"
            . "Влажность воздуха: " . $resp->humidity . "%<br>"
            . "Время суток: " . $resp->daytime . "<br>"
            . "Сезон: " . $resp->season . "<br>";
    }
}
