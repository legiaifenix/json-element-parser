<?php
namespace legiaifenix\jsonParser\Builders;


class JsonElementsBuilder extends ElementsBuilder
{

    public function __construct(string $fileContents)
    {
        $this->fileContents = json_decode($fileContents, true);
    }

    public function build()
    {
        return "Json Builder";
    }

}