<?php
namespace legiaifenix\jsonParser\Utils;


use legiaifenix\jsonParser\Exceptions\Files\FileDoesNotExistsException;

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
}