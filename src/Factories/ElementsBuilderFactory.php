<?php
namespace legiaifenix\jsonParser\Factories;


use legiaifenix\jsonParser\Builders\ElementsBuilder;
use legiaifenix\jsonParser\Exceptions\Files\FileDoesNotExistsException;
use legiaifenix\jsonParser\Exceptions\Files\FileDoesNotHaveExtension;
use legiaifenix\jsonParser\Exceptions\Builders\ClassNotSupportedException;
use legiaifenix\jsonParser\Services\Handlers\BuilderPathHandler;
use legiaifenix\jsonParser\Utils\Files;

class ElementsBuilderFactory
{
    /**
     * @param string $filePath
     * @return mixed
     * @throws FileDoesNotExistsException
     * @throws FileDoesNotHaveExtension
     * @throws ClassNotSupportedException
     */
    public static function create(string $filePath) :? ElementsBuilder
    {
        $content    = Files::loadFileContents($filePath);

        $handler = new BuilderPathHandler();
        $classname = $handler->handle(Files::fileType($filePath));

        return new $classname($content);
    }
}