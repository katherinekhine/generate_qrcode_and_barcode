<?php

// use BaconQrCode\Encoder\QrCode;
use Illuminate\Support\Facades\Route;
use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;
use SimpleSoftwareIO\QrCode\QrCodeServiceProvider;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('qrcode', function () {
    // return QrCode::size(300)->generate('A Basic example of QR code!');
    return QrCode::SMS('111-222-3333', 'Hello World!');
});

Route::get('barcode', function () {
    $generatePng = new \Picqer\Barcode\BarcodeGeneratorHTML();
    $image = $generatePng->getBarcode('0000002514783', $generatePng::TYPE_CODE_128);

    // \Illuminate\Support\Facades\Storage::put('barcodes/demo.png', $image);

    // return response($image)->header('Content-Type', 'image/png');

    return view('welcome', compact('image'));
});
