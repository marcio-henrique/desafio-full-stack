<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\OfficialDocument;
use App\Models\Provider;
use App\Utils\FileManipulation;
use App\Utils\FormatStringToNumber;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    public function index () {
        return Provider::with('officialDocument')->orderBy('name', 'asc')->paginate(10);
    }

    public function show($id) {
        return Provider::with('officialDocument')->get()->find($id);
    }

    public function store (Request $request): \Illuminate\Http\JsonResponse
    {
        //conversão do json em objeto
        $request->officialDocument = json_decode($request->officialDocument);
        $request->provider = json_decode($request->provider);
        $request->services = json_decode($request->services);

        //retirada das máscaras de número
        $request->officialDocument->number = FormatStringToNumber::stringToInt($request->officialDocument->number);
        $request->provider->phoneNumber = FormatStringToNumber::stringToInt($request->provider->phoneNumber);

        $officialDocument = OfficialDocument::create($request->officialDocument);

        $photoUrl = null;
        if (isset($request->photo))
            $photoUrl = FileManipulation::storePhoto($request->photo);

        $provider = Provider::create($request->provider, $officialDocument->id, $photoUrl);

        (new ServiceController)->storeMassive($request->services, $provider->id);



        return response()->json("success");
    }

}
