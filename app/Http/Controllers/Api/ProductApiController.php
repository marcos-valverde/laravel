<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormResquest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function productsByTenant(TenantFormResquest $request)
    {
        $products = $this->productService->getProductByTenantUuid(
            $request->token_company,
            $request->get('categories', [])
        );

        return ProductResource::collection($products);
    }

    public function show(TenantFormResquest $request, $flag)
    {
        if(!$product = $this->productService->getProductByFlag($flag))
        {
            return response()->json(['message' => 'Product Not Found...'], 404);
        }
        return new ProductResource($product);
    }
}
