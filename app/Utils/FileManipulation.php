<?php


namespace App\Utils;


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
}
