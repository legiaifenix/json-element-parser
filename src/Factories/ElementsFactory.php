<?php
namespace legiaifenix\jsonParser\Factories;


use legiaifenix\jsonParser\Exceptions\Files\FileDoesNotExistsException;
use legiaifenix\jsonParser\Exceptions\Files\FileDoesNotHaveExtension;
use legiaifenix\jsonParser\Utils\Files;

class ElementsFactory
{
    public static function create(string $filePath)
    {
        try {
            $content = Files::loadFileContents($filePath);
            echo Files::fileType($filePath);
        } catch (FileDoesNotHaveExtension $e) {
            echo $e->getMessage();
        } catch (FileDoesNotExistsException $e) {
            echo $e->getMessage();
        }

    }
}