<?php
namespace legiaifenix\jsonParser\Builders;


use legiaifenix\jsonParser\Models\Element;
use legiaifenix\jsonParser\Utils\Draw;

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

    /**
     * Loops the entirety of the file and, per loop, tries to generate the identifiable element from it.
     * Each element is added to the array of primary elements located within this object.
     * Each primary element can hold a list of children than, by themselves, can also contain a list of children and so on
     */
    public function build()
    {
        foreach ($this->fileContents as $key => $element) {
            if ($this->generatePrimaryElements($element, $key))
                continue;

            $this->generateArrayBasedElements($element, false);
        }
    }

    /**
     * This generates the primary elements found within the file. Since they can contain a block of array content or
     * singular elements within them
     *
     * @param $element
     * @return bool
     */
    protected function generatePrimaryElements($element, $type)
    {
        if (!is_array($element) || count($element) == 1) {
            if (is_array($element))
                $element = array_pop($element);

            $this->elements[] = $this->generateSpecificElementTypes($element, $type);
            return true;
        }

        return false;
    }

    protected function generateArrayBasedElements($elements, bool $primaryGenerated, Element $parentElement = null)
    {
        asort($elements, SORTSIZE | SORT_NUMERIC);

        foreach ($elements as $key => $element) {
            if (!$primaryGenerated) {
                $this->generatePrimaryElements($element, $key);
                //Grab the last generated primary element as it is the parent of the upcoming array
                $parentElement = end($this->elements);
                $primaryGenerated = true;
            } else {
                if (!is_array($element) || count($element) == 1) {
                    if (is_array($element))
                        $element = end($element);

                    $elementChild = $this->generateSpecificElementTypes($element, $key);
                    $parentElement->setChild($elementChild);
                    continue;
                }

                $this->generateArrayBasedElements($element, true, $parentElement);
            }
        }
    }

    /**
     * After owning a list of elements it will loop them to draw their structure
     */
    public function draw()
    {
        $output = '';
        /**
         * @var Element $element
         */
        foreach ($this->elements as $element) {
            $output .= Draw::drawElement($element);
        }

        return $output;
    }

    abstract public function generateSpecificElementTypes($content, string $type = '');
}