<?php

use PHPHtmlParser\Dom;

ini_set("display_errors", true);

class Controller
{
    private array $request;
    private string $lastError;
    private Dom $dom;
    private string $folderPath;

    public function init($request)
    {
        $this->lastError = false;
        $this->request = $request;
        $this->request['file-type'] = 'pdf';
        if ($this->request['link'] && $this->request['file-type']) {
            if ($this->checkLink($this->request['link'])) {
                $this->dom = new Dom();
                return ['result' => $this->runParse()];
            }
        } else {
            $this->lastError = 'Прийшли не всі параметри, заповніть форму ще раз';
        }
        return ['error' => $this->lastError];
    }

    public function checkLink($link):bool
    {
        if (!stristr("https://telegra.ph/", $link)) {
            $this->lastError = 'Введіть посилання на телеграф';
            return false;
        } elseif ($link === 'https://telegra.ph/') {
            $this->lastError = 'Потрібно ввести посилання на конкретну статтю';
            return false;
        }
        else {
            return true;
        }
    }

    private function runParse()
    {
        $srcFile = false;
        if ($this->createTempFolder()) {
            $allHtml = $this->getHtml();
            if (!empty($allHtml)) {
                $this->dom->loadStr($allHtml);
                $imageTags = $this->dom->find("#_tl_editor img");
                $title = $this->dom->find('.tl_article_header h1')[0]->text;
                foreach ($imageTags as $i => $imageTag) {
                    if (!$this->saveImage($imageTag->src, $i + 1)) {
                        return $this->returnError();
                    }
                }
                switch ($this->request['file-type']) {
                    case "pdf":
                        $srcFile = (new PdfCreator($this->folderPath, $title))->create();
                        break;
                }
            } else {
                $this->lastError = 'Не вдалося прочитати сторінку, перевірте коректність посилання';
            }
        }
        if (!$srcFile) $this->lastError = 'Не вдалося створити файл :(';

        if (!$this->lastError && $srcFile) {
            $srcResult = str_replace($_SERVER['DOCUMENT_ROOT'], '', $srcFile);
            return ['src' => $srcResult, 'name' => $title . "." . $this->request['file-type']];
        } else {
            return $this->lastError;
        }
    }

    private function createTempFolder(): bool
    {
        $this->folderPath = $_SERVER['DOCUMENT_ROOT'] . '/upload/' . $_SERVER['REMOTE_ADDR'];
        if (is_dir($this->folderPath)) {
            Utils::deleteDir($this->folderPath);
        }
        $resCreateDir = mkdir($this->folderPath);
        if (!$resCreateDir) {
            $this->lastError = 'Не вдалося створити тимчасову папку. Спробуйте пізніше';
            return false;
        }
        return true;
    }

    private function getHtml()
    {
        $html = file_get_contents($this->request['link']);
        return str_replace("/file/", 'https://telegra.ph/file/', $html);
    }

    private function saveImage($src, $number)
    {
        $imageRawData = file_get_contents($src);
        $imageParams = pathinfo($src);

        if (!file_put_contents($this->folderPath . "/$number.{$imageParams['extension']}", $imageRawData)) {
            $this->lastError = 'Помилка скачування картинки' . $src;
            return false;
        }
        return true;
    }

    private function returnError(): string
    {
        return json_encode(['error' => $this->lastError]);
    }


}