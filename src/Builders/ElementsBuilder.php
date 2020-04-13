<?php
namespace legiaifenix\jsonParser\Builders;


use legiaifenix\jsonParser\Models\Paragraph;

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

    protected function generateElement($element)
    {
        if (!is_array($element))
            return new Paragraph($element);

        if (is_array($element)) {
            //todo need to check the element types and recursive calls for the content for them
        }

    }
}