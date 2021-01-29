<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
//    use HasFactory;


    public static function create ($providerData, $officialDocummentId, $photoUrl): Provider
    {
        $provider = new Provider;
        $provider->name = $providerData->name;
        $provider->email = $providerData->email;
        $provider->phone_number = $providerData->phoneNumber;
        $provider->photo_url = $photoUrl;
        $provider->official_document_id = $officialDocummentId;
        $provider->save();

        return $provider;
    }

    public function officialDocument(){
        return $this->belongsTo(OfficialDocument::class);
    }

    public function services () {
        return $this->hasMany(Service::class);
    }
}
