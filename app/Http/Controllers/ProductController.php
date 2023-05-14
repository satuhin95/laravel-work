<?php

namespace App\Http\Controllers;
use Exception;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\jsonResponse;
use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    use ResponseTrait;
    public $productRepository;
    public function __construct(ProductRepository $productRepository){
        $this->productRepository = $productRepository;
    }
    
    /**
     * @OA\Get(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="Get All Products",
     *     description="Multiple status values can be provided with comma separated string",
     *     operationId="index",
     *     @OA\Parameter(
     *         name="status",
     *         in="query",
     *         description="Status values that needed to be considered for filter",
     *         required=true,
     *         explode=true,
     *         @OA\Schema(
     *             default="available",
     *             type="string",
     *             enum={"available", "pending", "sold"},
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *  
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     )
     * )
     */
    
    public function index():JsonResponse{
        try {
            
            return $this->responseSuccess($this->productRepository->getAll(),'Product fetched successfully');
        } catch (Exception $e) {
            return $this->responseError([],$e->getMessage());

        }
    }
}
