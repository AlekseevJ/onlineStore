<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Token;
use App\Models\Product;
use App\Services\ProductService;

class CartController extends BaseProductController
{
   public function add(Request $request)
   {
      $what = new ProductService();
      $us = $this->productRepository->findUserByToken($request);
      $cart = $this->productRepository->getUnEndedCart($us);
      $what->addBasket($request,$cart);
      $carts = $this->productRepository->showBasket($cart);
      return response($carts);
   }
   public function showmybasket(Request $request)
   {
      $us = $this->productRepository->findUserByToken($request);
      $cart = $this->productRepository->getUnEndedCart($us);
      $carts = $this->productRepository->showBasket($cart);
      return response($carts);
   }
   public function pay(Request $request)
   {
      $us = $this->productRepository->findUserByToken($request);
      $cart = $this->productRepository->getStrongUnEndedCart($us);
      $what = new ProductService();
      $itogo = $what->sumPrice($what->getProductFromCart($cart));
      $this->productRepository->endCart($cart);
      return response($itogo);
   }
   public function showhistory(Request $request)
   {
      $us = $this->productRepository->findUserByToken($request);
      $carts = $this->productRepository->getAllEndedCart($us); 
      $what = new ProductService();
      $pul = $what->getCartHistory($carts);
      return response($pul);
   }
}
