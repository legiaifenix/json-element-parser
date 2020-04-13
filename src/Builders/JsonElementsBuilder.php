<?php
namespace legiaifenix\jsonParser\Builders;


class JsonElementsBuilder
{
    /**
     * @var array $elements             As the array that will contain all references to our elements
     */
    protected $elements;

    /**
     * @var array $fileContents        As the content of the target file we wish to read
     */
    protected $fileContents;

    protected $director;

    public function __construct(string $fileContents)
    {
        $this->fileContents = json_decode($fileContents, true);
        print_r($this->fileContents);
    }



}