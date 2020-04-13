<?php
namespace legiaifenix\jsonParser\Exceptions\Files;


class FileDoesNotHaveExtension extends \Exception
{

    public function __construct($file = "NA", $code = 0, Throwable $previous = null)
    {
        parent::__construct($this->buildMessage($file), $code, $previous);
    }

    private function buildMessage(string $file)
    {
        return sprintf("The file extension was not detected. Please make sure you defined the file type for (%s)",
            $file
        );
    }

}