<?php

/**
 * Class AbstractAttachment
 */
abstract class AbstractAttachment {

    /**
     * @var string
     */
    private $fileName;

    /**
     * Attachment constructor.
     *
     * @param string $fileName
     */
    public function __construct($fileName)
    {
        if(!strlen($fileName)) {
            throw new InvalidArgumentException('File name can not be empty');
        }

        $this->fileName = $fileName;
    }

    /**
     * Get the file name
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Get the content of the attachment
     *
     * @return mixed
     */
    public abstract function getContent();
}
