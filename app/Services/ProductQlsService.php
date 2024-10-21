<?php

namespace App\Services;

class ProductQlsService extends BaseQlsService
{

    public function getProducts(string $companyId): array
    {
       return $this->makeRequest('get','/company/'. $companyId .'/product')['data'];
    }

}
