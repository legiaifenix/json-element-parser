<?php
namespace legiaifenix\jsonParser\Builders;


use legiaifenix\jsonParser\Factories\ElementsFactory;
use legiaifenix\jsonParser\Models\Element;
use legiaifenix\jsonParser\Utils\Draw;

class JsonElementsBuilder extends ElementsBuilder
{

    public function __construct(string $fileContents)
    {
        $this->fileContents = json_decode($fileContents, true);
    }

    public function generateSpecificElementTypes($content, string $type = '')
    {
        switch ($type) {
            case ElementsFactory::TITLE_ELEMENT:
                return ElementsFactory::createTitle($content);

            case ElementsFactory::PARAGRAPH_ELEMENT:
            default:
                return ElementsFactory::createParagraph($content);
        }
    }

}