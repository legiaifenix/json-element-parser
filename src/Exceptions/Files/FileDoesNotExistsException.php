<?php


namespace legiaifenix\jsonParser\Exceptions\Files;


use http\Encoding\Stream;
use Throwable;

class FileDoesNotExistsException extends \Exception
{
    public function __construct($file = "NA", $code = 0, Throwable $previous = null)
    {
        parent::__construct($this->buildMessage($file), $code, $previous);
    }

    private function buildMessage(string $file)
    {
        return sprintf("Was not possible to open the file (%s). Check if the path is correct or if the file exists",
            $file
        );
    }
}