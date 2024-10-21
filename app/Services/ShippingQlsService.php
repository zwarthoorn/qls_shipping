<?php

namespace App\Services;

class ShippingQlsService extends BaseQlsService
{

    public function getShippingLabel(array $data)
    {
       return $this->makeRequest('post','/company/'.config('services.qls.extra.companyId').'/shipment/create',$data);
    }

}
