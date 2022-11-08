<?php

namespace App\Sevice\Product;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Sevice\BaseSevice;

class ProductSevice extends BaseSevice implements ProductSeviceInterface
{
    public $repository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->repository = $productRepository;
    }
}
