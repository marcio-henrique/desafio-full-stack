<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ServiceProvision;
use App\Utils\FileManipulation;
use Illuminate\Http\Request;

class ServiceProvisionController extends Controller
{
    public function index() {
        return ServiceProvision::with('provider', 'service')->paginate(10);
    }
    public function store(Request $request) {
        FileManipulation::getDataFromCsv($request->csv);
    }
}
