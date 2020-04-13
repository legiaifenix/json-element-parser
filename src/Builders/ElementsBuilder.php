<?php
namespace legiaifenix\jsonParser\Builders;


abstract class ElementsBuilder
{

    /**
     * @var array $elements             As the array that will contain all references to our elements
     */
    protected $elements;

    /**
     * @var array $fileContents        As the content of the target file we wish to read
     */
    protected $fileContents;

    abstract public function build();
}