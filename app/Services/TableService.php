<?php

namespace App\Services;

use App\Repositories\Contracts\TableRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TableService
{
    protected $tenantRepository, $table;

    public function __construct(
        TenantRepositoryInterface $tenantRepository,
        TableRepositoryInterface $table
    ) {
        $this->tenantRepository = $tenantRepository;
        $this->table = $table;
    }

    public function getTablesByUuid(string $uuid)
    {
        $tenant = $this->tenantRepository->getTenantByUuid($uuid);

        return $this->table->getTableByTenantId($tenant->id);
    }

    public function getTableByIdentify(string $identify)
    {
        return $this->table->getTableByIdentify($identify);
    }
}