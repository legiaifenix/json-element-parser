<?php
namespace legiaifenix\jsonParser\Services\Handlers;


use legiaifenix\jsonParser\Exceptions\Builders\ClassNotSupportedException;
use legiaifenix\jsonParser\Utils\Files;

class BuilderPathHandler
{

    protected $allowedFileTypes = ['json'];

    /**
     * @param string $type
     * @throws ClassNotSupportedException
     */
    public function handle(string $type) :? string
    {
        $classname = 'legiaifenix\\jsonParser\Builders\\' . ucfirst($type) . 'ElementsBuilder';

        if (!class_exists($classname))
            throw new ClassNotSupportedException($type);

        return $classname;
    }

}