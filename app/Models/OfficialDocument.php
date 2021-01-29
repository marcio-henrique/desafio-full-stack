<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficialDocument extends Model
{
//    use HasFactory;
    public static function create($officialDocumentData): OfficialDocument
    {
        $officialDocument = new OfficialDocument;
        $officialDocument->type = $officialDocumentData->type;
        $officialDocument->number = $officialDocumentData->number;
        $officialDocument->save();

        return $officialDocument;
    }
}
