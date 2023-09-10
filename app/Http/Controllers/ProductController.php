<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\DeleteProduct;
use Illuminate\Http\Request;
use App\Services\ProductService;

class ProductController extends BaseProductController
{
  public function index()
  {
    $what = new ProductService();
    $what = $what->getIn($this->productRepository->all());
    return response($what);
  }

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

  public function destroy(DeleteProduct $request)
  { 
    $this->productRepository->delete($request);
    return response($request->input('id').' удален.');
  }
}
