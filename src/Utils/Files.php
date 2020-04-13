<?php
namespace legiaifenix\jsonParser\Utils;


use legiaifenix\jsonParser\Exceptions\Files\FileDoesNotExistsException;
use legiaifenix\jsonParser\Exceptions\Files\FileDoesNotHaveExtension;

class Files
{
    /**
     * @param string $filePath
     * @return false|string
     * @throws FileDoesNotExistsException
     */
    public static function loadFileContents(string $filePath)
    {
        if (file_exists($filePath))
            return file_get_contents($filePath);

        throw new FileDoesNotExistsException($filePath);
    }

    /**
     * @param $filePath
     * @return mixed
     * @throws FileDoesNotHaveExtension
     */
    public static function fileType($filePath)
    {
        $type = explode('.', $filePath);
        if (count($type) > 1)
            return end($type);

        throw new FileDoesNotHaveExtension($filePath);
    }
}