<?php

class PdfCreator
{

    private $pathToFolderPictures;
    private $title;

    public function __construct($pathToFolderPictures, $title)
    {

        $this->pathToFolderPictures = $pathToFolderPictures;
        $this->title = $title;
    }

    public function create()
    {

    }
}