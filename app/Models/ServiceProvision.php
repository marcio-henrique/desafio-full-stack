<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvision extends Model
{
    use HasFactory;

    public function provider () {
        return $this->belongsTo(Provider::class);
    }
    public function service () {
        return $this->belongsTo(Service::class);
    }

    public static function create ($providerId, $serviceId, $clientName) {
        $serviceProvision = new ServiceProvision;
        $serviceProvision->provider_id = $providerId;
        $serviceProvision->service_id = $serviceId;
        $serviceProvision->client_name = $clientName;

        $serviceProvision->save();
    }
}
