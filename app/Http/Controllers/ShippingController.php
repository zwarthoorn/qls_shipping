<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingRequest;
use App\Services\ProductQlsService;
use App\Services\ShippingQlsService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Mail\Markdown;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;

class ShippingController extends Controller
{
    public function generate(ShippingRequest $request, ShippingQlsService $service, ProductQlsService $productQlsService)
    {
        // Validate the request
        $request->validated();

        $combination = collect($productQlsService->getProducts(config('services.qls.extra.companyId')))
                           ->where('id', $request->input('selectedProductId'))
                           ->first()['combinations'][0]['id'];


        // Example order data, potentially generated dynamically
        $order = [
            'number' => '#' . rand(100000, 999999),
            'order_lines' => [
                [
                    'amount_ordered' => 2,
                    'name' => 'Jeans - Black - 36',
                    'sku' => 69205,
                    'ean' => '8710552295268',
                ],
                [
                    'amount_ordered' => 1,
                    'name' => 'Sjaal - Rood Oranje',
                    'sku' => 25920,
                    'ean' => '3059943009097',
                ],
            ],
        ];

        // Building the shipping request using request inputs instead of `$this` references
        $build = [
            'brand_id' => config('services.qls.extra.brandId'),
            'companyname' => $request->input('deliveryName'),
            'reference' => $order['number'],
            'weight' => 1000,
            'product_id' => $request->input('selectedProductId'),
            'product_combination_id' => $combination,
            'cod_amount' => 0,
            'piece_total' => 1,
            'receiver_contact' => [
                'name' => $request->input('deliveryName'),
                'companyname' => $request->input('deliveryName'),
                'street' => $request->input('deliveryStreet'),
                'housenumber' => $request->input('deliveryHouseNumber'),
                'postalcode' => $request->input('deliveryZipcode'),
                'locality' => $request->input('deliveryCity'),
                'country' => $request->input('deliveryCountry'),
                'email' => $request->input('billingEmail'),
            ],
        ];

        // Call to shipping service to process the built shipping data
        $data = $service->getShippingLabel($build)['data'];

        //get label
        $label = Http::get($data['labels']['a6']);


        Storage::put($order['number'].'.pdf',$label->body());


        $existingPdfPath = storage_path('app/private/'.$order['number'].'.pdf');
        $image = storage_path('app/public/image.jpg');
        $pdf = new \Spatie\PdfToImage\Pdf($existingPdfPath);
        $pdf->save($image);

        // Shipping label data
        $data = [
            'receiver_name' => $build['receiver_contact']['name'],
            'address' => $build['receiver_contact']['street'].' '.$build['receiver_contact']['housenumber'] ,
            'postal_code' =>  $build['receiver_contact']['postalcode'],
            'city' =>  $build['receiver_contact']['locality'],
            'country' => $build['receiver_contact']['country'],
            'imagePath' => $image
        ];

        $pdf = PDF::loadView('shipping.label', $data)->setPaper([0, 0, 595.28, 841.89], 'portrait');

        return $pdf->download();
    }


}
