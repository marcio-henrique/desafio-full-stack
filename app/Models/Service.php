<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public static function create($serviceData, $providerId) {
        $service = new Service;
        $service->name = $serviceData->name;
        $service->value = $serviceData->value;
        $service->provider_id = $providerId;
        $service->status = 1;   //ativo
        $service->save();
    }

    public function provider () {
        return $this->belongsTo(Provider::class);
    }
}
