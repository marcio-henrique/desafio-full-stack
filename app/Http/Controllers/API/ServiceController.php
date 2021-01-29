<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OfficialDocument;
use App\Models\Service;
use App\Utils\FormatStringToNumber;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function storeMassive ($services, $providerId) {
        foreach ($services as $service) {
            $service->value = FormatStringToNumber::moneyMaskedStringToFloat($service->value);
            Service::create($service, $providerId);
        }
    }
}
