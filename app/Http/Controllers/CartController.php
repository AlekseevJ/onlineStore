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
   /**
   * @OA\Post(
   *     path="/api/basket/add",
   *     tags={"Cart"},
   *     description="Добавить товар в корзину",
   * 
   *  @OA\Parameter(
   *      name="token",
   *      in="header",
   *      required=true,
   *      @OA\Schema(
   *           type="string"
   *      )
   *   ),
   *     @OA\Response(
   *         response="200",
   *         description="The data"
   *     ),
   *  @OA\RequestBody(
   *         required=true,
   *         @OA\JsonContent(
   *            required={"id"},
   *            @OA\Property(property="id", type="string", format="string", example="4"),
   *         ),
   *      ),
   * 
   * )
   * @return \Illuminate\Http\JsonResponse
   */
   public function add(Request $request)
   {
      $what = new ProductService();
      $us = $this->productRepository->findUserByToken($request);
      $cart = $this->productRepository->getUnEndedCart($us);
      $what->addBasket($request,$cart);
      $carts = $this->productRepository->showBasket($cart);
      return response($what->getInCart($carts));
   }
   /**
   * @OA\Get(
   *     path="/api/basket/showmybasket",
   *     tags={"Cart"},
   *     description="Показать текущую корзину",
   * 
   *  @OA\Parameter(
   *      name="token",
   *      in="header",
   *      required=true,
   *      @OA\Schema(
   *           type="string"
   *      )
   *   ),
   *     @OA\Response(
   *         response="200",
   *         description="The data"
   *     ),
   *      ),
   * )
   * @return \Illuminate\Http\JsonResponse
   */
   public function showmybasket(Request $request)
   {
      $us = $this->productRepository->findUserByToken($request);
      $cart = $this->productRepository->getUnEndedCart($us);
      $carts = $this->productRepository->showBasket($cart);
      return response($carts);
   }
   /**
   * @OA\Get(
   *     path="/api/basket/pay",
   *     tags={"Cart"},
   *     description="Оплатить товары в корзине",
   * 
   *  @OA\Parameter(
   *      name="token",
   *      in="header",
   *      required=true,
   *      @OA\Schema(
   *           type="string"
   *      )
   *   ),
   *     @OA\Response(
   *         response="200",
   *         description="The data"
   *     ),
   *      ),
   * )
   * @return \Illuminate\Http\JsonResponse
   */
   public function pay(Request $request)
   {
      $us = $this->productRepository->findUserByToken($request);
      $cart = $this->productRepository->getStrongUnEndedCart($us);
      $what = new ProductService();
      $itogo = $what->sumPrice($what->getProductFromCart($cart));
      $this->productRepository->endCart($cart);
      return response($itogo);
   }
   /**
   * @OA\Get(
   *     path="/api/basket/showhistory",
   *     tags={"Cart"},
   *     description="Посмотреть историю покупок",
   * 
   *  @OA\Parameter(
   *      name="token",
   *      in="header",
   *      required=true,
   *      @OA\Schema(
   *           type="string"
   *      )
   *   ),
   *     @OA\Response(
   *         response="200",
   *         description="The data"
   *     ),
   *      ),
   * )
   * @return \Illuminate\Http\JsonResponse
   */
   public function showhistory(Request $request)
   {
      $us = $this->productRepository->findUserByToken($request);
      $carts = $this->productRepository->getAllEndedCart($us); 
      $what = new ProductService();
      $pul = $what->getCartHistory($carts);
      return response($pul);
   }
}
