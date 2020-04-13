<?php
namespace legiaifenix\jsonParser\Models;


abstract class Element
{
    /**
     * @var string $id              As the ID to attach to the element
     */
    protected $id;

    /**
     * @var string $class           As the class to attach to the element
     */
    protected $class;

    /**
     * @var string $text            As the text in context within the element
     */
    protected $text;

    /**
     * @var string $element         As the type of element it should be drawing in the frontend
     */
    protected $element;

    /**
     * @var Element $child          As the link reference for the children that belong to this element
     */
    protected $child;

    public function __construct(string $text, string $element)
    {
        $this->text     = $text;
        $this->element  = $element;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getElement(): string
    {
        return $this->element;
    }

}