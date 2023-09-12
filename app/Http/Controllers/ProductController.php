<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\DeleteProduct;
use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends BaseProductController
{
  /**
   * @OA\Get(
   *     path="/api/product",
   *     tags={"Product"},
   *     description="Получить все продукты",
   *     @OA\Response(
   *         response="200",
   *         description="The data"
   *     )
   * )
   * @return \Illuminate\Http\JsonResponse
   */
  public function index()
  {
    $what = new ProductService();
    $item = $what->getIn($this->productRepository->all());
    return response($item);
  }

  /**
   * @OA\Post(
   *     path="/api/product",
   *     tags={"Product"},
   *     description="Создать новый продукт",
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
   *            required={"name", "price", "color"},
   *            @OA\Property(property="name", type="string", format="string", example="Iphone 4s"),
   *            @OA\Property(property="price", type="integer", format="integer", example="1002"),
   *            @OA\Property(property="color", type="string", format="string", example="Black"),
   *            @OA\Property(property="desc", type="string", format="string", example="The small phone with the camera"),
   *         ),
   *      ),
   * 
   * )
   * @return \Illuminate\Http\JsonResponse
   */

  public function store(StoreProductRequest $request)
  {
    $item = $this->productRepository->createItem($request);
    return response($item);
  }

  public function update(UpdateProductRequest $request)
  {
    $item = $this->productRepository->update($request);
    return response($item);
  }
  /**
   * @OA\Post(
   *     path="/api/product/put",
   *     tags={"Product"},
   *     description="Обновить существующий продукт",
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
   *            required={"id","name", "price", "color"},
   *            @OA\Property(property="id", type="string", format="string", example="3"),
   *            @OA\Property(property="name", type="string", format="string", example="Iphone 4s"),
   *            @OA\Property(property="price", type="integer", format="integer", example="1002"),
   *            @OA\Property(property="color", type="string", format="string", example="Black"),
   *            @OA\Property(property="desc", type="string", format="string", example="The small phone with the camera"),
   *         ),
   *      ),
   * 
   * )
   * @return \Illuminate\Http\JsonResponse
   */
  public function updateForSwagger(UpdateProductRequest $request)
  {
    $item = $this->productRepository->update($request);
    return response($item);
  }

  public function destroy(DeleteProduct $request)
  {
    $this->productRepository->delete($request);
    return response($request->input('id') . ' удален.');
  }
  /**
   * @OA\Post(
   *     path="/api/product/delete",
   *     tags={"Product"},
   *     description="Удалить продукт по ID",
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
   *            @OA\Property(property="id", type="string", format="string", example="3"),
   *         ),
   *      ),
   * 
   * )
   * @return \Illuminate\Http\JsonResponse
   */
  public function destroySwag(DeleteProduct $request)
  {
    $this->productRepository->delete($request);
    return response($request->input('id') . ' удален.');
  }
}
