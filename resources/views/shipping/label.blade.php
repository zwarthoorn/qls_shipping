<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shipping Label</title>
        <style>
            @page {
                size: A4;
                margin: 0;
            }
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
            }
            .page {
                width: 210mm;
                height: 297mm;
                padding: 10mm;
                box-sizing: border-box;
                page-break-after: avoid;
            }
            .label-header {
                text-align: center;
                margin-bottom: 10px;
            }
            .label-header img {
                max-width: 100%;
                max-height: 200mm; /* Adjust as needed */
                height: auto;
            }
            .label-details {
                margin-top: 10px;
            }
            .label-details .info {
                font-size: 12px;
                margin-bottom: 5px;
            }
        </style>
    </head>
    <body>
        <div class="page">
            <div class="label-header">
                <img src="data:image/jpeg;base64,{{ base64_encode(file_get_contents($imagePath)) }}" alt="Shipping Label Image">
            </div>
            <div class="label-details">
                <div class="info"><strong>Receiver:</strong> {{ $receiver_name }}</div>
                <div class="info"><strong>Address:</strong> {{ $address }}</div>
                <div class="info"><strong>Postal Code:</strong> {{ $postal_code }}</div>
                <div class="info"><strong>City:</strong> {{ $city }}</div>
                <div class="info"><strong>Country:</strong> {{ $country }}</div>
            </div>
        </div>
    </body>
</html>
