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
    
    public function index():JsonResponse{
        try {
            
            return $this->responseSuccess($this->productRepository->getAll(),'Product fetched successfully');
        } catch (Exception $e) {
            return $this->responseError([],$e->getMessage());

        }
    }
}
