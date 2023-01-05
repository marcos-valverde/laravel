<?php

namespace App\Services;

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class ProductService
{
    protected $tenantRepository, $productRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,  
        TenantRepositoryInterface $tenantRepository
    ) {
        $this->productRepository = $productRepository;
        $this->tenantRepository = $tenantRepository;
    }

    public function getProductByTenantUuid(string $uuid, array $categories)
    {
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        return $this->productRepository->getProductByTenantId($tenant->id, $categories);    
    }

    public function getProductByFlag(string $flag)
    {
        return $this->productRepository->getProductByFlag($flag);    
    }
}