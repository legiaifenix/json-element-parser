<?php


namespace legiaifenix\jsonParser\Exceptions\Builders;


class ClassNotSupportedException extends \Exception
{

    public function __construct($type = "NA", $code = 0, Throwable $previous = null)
    {
        parent::__construct($this->buildMessage($type), $code, $previous);
    }

    private function buildMessage(string $type)
    {
        return sprintf("File extension not yet supported. Found %s. Please check our supported files at the README documentation",
            $type
        );
    }

}