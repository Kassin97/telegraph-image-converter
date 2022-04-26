<?php
use PHPHtmlParser\Dom;

class HtmlParser
{
    private Dom $dom;

    public function __construct()
    {
        $this->dom = new Dom;
    }


}