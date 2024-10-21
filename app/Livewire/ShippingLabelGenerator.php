<?php

namespace App\Livewire;

use App\Services\ProductQlsService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ShippingLabelGenerator extends Component
{
    public $order;
    public $products = [];
    public $selectedProductId;
    public $selectedCombinationId;
    public $generatedLabel;
    public $combinedPdfPath;

    // Billing Address Fields
    public $billingName;
    public $billingStreet;
    public $billingHouseNumber;
    public $billingZipcode;
    public $billingCity;
    public $billingCountry;
    public $billingEmail;
    public $billingPhone;

    // Delivery Address Fields
    public $deliveryName;
    public $deliveryStreet;
    public $deliveryHouseNumber;
    public $deliveryZipcode;
    public $deliveryCity;
    public $deliveryCountry;

    protected $rules = [
        'selectedProductId' => 'required',
        'selectedCombinationId' => 'required',
        'billingName' => 'required',
        'billingStreet' => 'required',
        'billingHouseNumber' => 'required',
        'billingZipcode' => 'required',
        'billingCity' => 'required',
        'billingCountry' => 'required',
        'billingEmail' => 'required|email',
        'billingPhone' => 'required',
        'deliveryName' => 'required',
        'deliveryStreet' => 'required',
        'deliveryHouseNumber' => 'required',
        'deliveryZipcode' => 'required',
        'deliveryCity' => 'required',
        'deliveryCountry' => 'required',
    ];

    public function mount(ProductQlsService $productQlsService)
    {
        $this->products = $productQlsService->getProducts(config('services.qls.extra.companyId'));


    }

    public function render()
    {
        return view('livewire.shipping-label-generator');
    }
}
