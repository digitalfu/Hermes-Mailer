<?php

/**
 * Class InMemoryAttachment
 */
class InMemoryAttachment extends AbstractAttachment {

    /**
     * @var string
     */
    protected $content;

    /**
     * Constructor
     *
     * @param string $fileName
     * @param string $content
     */
    public function __construct($fileName, $content) {
        parent::__construct($fileName);

        if(!strlen($content)){
             throw new InvalidArgumentException('Attachment content cannot be empty');
        }

        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
}