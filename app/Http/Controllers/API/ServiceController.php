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

    public function showServiceWithProviderId($providerId) {
        return Service::where('provider_id', '=', $providerId)->orderBy('name', 'asc')->paginate(5);
    }

    public function updateStatus(Request $request, $id) {
        $service = Service::find($id);
        $service->status = $request['status'];
        $service->save();

        return ('ok');
    }

    public function filterByName($name) {
        return Service::where('name', '=', $name)->first();
    }
}
