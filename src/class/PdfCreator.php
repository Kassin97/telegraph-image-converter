<?php

class PdfCreator
{

    private string $pathToFolderPictures;
    private string $title;

    public function __construct($pathToFolderPictures, $title)
    {

        $this->pathToFolderPictures = $pathToFolderPictures;
        $this->title = $title;
    }

    public function create():string
    {

        $arPictures = Utils::getFilesList($this->pathToFolderPictures);
        $arPictures = Utils::sortFiles($arPictures);

        $mpdf = new \Mpdf\Mpdf();
        foreach ($arPictures as $pictureName) {
            $mpdf->AddPage();
            $mpdf->WriteHTML('<img src="'.$this->pathToFolderPictures.'/'.$pictureName.'" alt="">');
        }

        $srcPdf = $this->pathToFolderPictures . '/' . "{$this->title}.pdf";
        $mpdf->Output($srcPdf, "F");
        return $srcPdf;

    }
}