<?php
namespace legiaifenix\jsonParser\Builders;


use legiaifenix\jsonParser\Utils\Draw;

class JsonElementsBuilder extends ElementsBuilder
{

    protected $output = '';

    public function __construct(string $fileContents)
    {
        $this->fileContents = json_decode($fileContents, true);
    }

    public function build()
    {
        $this->loopFileContents();
        $this->loopElements();
        return $this->output;
    }

    private function loopFileContents()
    {
        foreach ($this->fileContents as $element) {
            $this->generateElement($element);
        }
    }

    private function loopElements()
    {
        foreach ($this->elements as $element) {
            $this->output .= Draw::drawElement($element);
        }
    }

}