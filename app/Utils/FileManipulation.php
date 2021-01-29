<?php


namespace App\Utils;


use App\Http\Controllers\API\ProviderController;
use App\Http\Controllers\API\ServiceController;
use App\Models\ServiceProvision;

class FileManipulation
{
    /**
     * @var string
     */
    private static $photoUrl = '/media/photos/';

    public static function storePhoto($file): string
    {
        return FileManipulation::storeFile(FileManipulation::$photoUrl, $file);
    }

    //salva arquivo na pasta public e retorna o local
    public static function storeFile ($pathUrl, $file): string
    {
        $fileExtension = $file->getClientOriginalExtension();

        $fileName = time().'.'.$fileExtension;  //garantia de nome único do arquivo

        $fullPath = public_path($pathUrl);
        $file->move($fullPath, $fileName);

        return $pathUrl.$fileName;
    }

    //extrai dados de um arquivo .csv formatado da seguinte forma
    public static function getDataFromCsv($file) {
        $csv = array_map('str_getcsv', file($file));
        array_walk($csv, function(&$a) use ($csv) {
            $a = array_combine($csv[0], $a);
        });
        $new = array_shift($csv); # remove column header
        foreach($csv as $line) {
            $provider = (new ProviderController)->filterByName($line["nome_do_provedor"]);
            $service = (new ServiceController)->filterByName($line["nome_do_serviço"]);
            ServiceProvision::create($provider->id, $service->id, $line["nome_do_cliente"]);

        }
        return $new;
    }
}
