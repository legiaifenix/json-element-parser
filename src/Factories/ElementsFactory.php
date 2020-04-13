<?php
namespace legiaifenix\jsonParser\Factories;


use legiaifenix\jsonParser\Builders\ElementsBuilder;
use legiaifenix\jsonParser\Exceptions\Files\FileDoesNotExistsException;
use legiaifenix\jsonParser\Exceptions\Files\FileDoesNotHaveExtension;
use legiaifenix\jsonParser\Utils\Files;

class ElementsFactory
{
    /**
     * @param string $filePath
     * @throws FileDoesNotExistsException
     * @throws FileDoesNotHaveExtension
     */
    public static function create(string $filePath) :ElementsBuilder
    {
        $content    = Files::loadFileContents($filePath);
        $classname  = self::prepareBuilderClassLoad(Files::fileType($filePath));
        return new $classname($content);
    }

    private static function prepareBuilderClassLoad(string $type)
    {
        $classname = 'legiaifenix\\jsonParser\Builders\\' . ucfirst($type) . 'ElementsBuilder';
        return $classname;
    }
}