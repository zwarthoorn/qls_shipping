@extends('components.layouts.app')

@section('content')
    <div>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">There were some problems with your input.</span>
            </div>
        @endif
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-6 text-center">Shipping Label Generator</h1>
            <form method="post" action="/shipping-label" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-4">Billing Address</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="billingName">Name</label>
                            <input name="billingName" type="text" id="billingName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="billingStreet">Street</label>
                            <input name="billingStreet" type="text" id="billingStreet" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="billingHouseNumber">House Number</label>
                            <input name="billingHouseNumber" type="text" id="billingHouseNumber" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="billingZipcode">Zipcode</label>
                            <input name="billingZipcode" type="text" id="billingZipcode" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="billingCity">City</label>
                            <input name="billingCity" type="text" id="billingCity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="billingCountry">Country</label>
                            <input name="billingCountry" type="text" id="billingCountry" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="billingEmail">Email</label>
                            <input name="billingEmail" type="email" id="billingEmail" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="billingPhone">Phone</label>
                            <input name="billingPhone" type="tel" id="billingPhone" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-4">Delivery Address</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="deliveryName">Name</label>
                            <input name="deliveryName" type="text" id="deliveryName" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="deliveryStreet">Street</label>
                            <input name="deliveryStreet" type="text" id="deliveryStreet" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="deliveryHouseNumber">House Number</label>
                            <input name="deliveryHouseNumber" type="text" id="deliveryHouseNumber" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="deliveryZipcode">Zipcode</label>
                            <input name="deliveryZipcode" type="text" id="deliveryZipcode" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="deliveryCity">City</label>
                            <input name="deliveryCity" type="text" id="deliveryCity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="deliveryCountry">Country</label>
                            <input name="deliveryCountry" type="text" id="deliveryCountry" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="product">
                        Select Product
                    </label>
                    <select name="selectedProductId" id="product" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Select a product</option>
                        @foreach($products as $product)
                            <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Generate Label
                    </button>
                </div>
            </form>
            @if(session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
                <div class="mt-4">
                    <a href="{{ asset('storage/combined-label.pdf') }}" target="_blank" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline inline-block">
                        View Combined Label
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
