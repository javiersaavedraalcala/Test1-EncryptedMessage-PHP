<?php

class DocumentManager {


    public function getContentFromFile($documentName) : string
    {
        $document = fopen($documentName, "r") or die("Unable to open file!");
        $content = fread($document,filesize($documentName));
        fclose($document);
        
        return $content;
    }

    public static function generateFile($name, $data)
    {
        $file = fopen($name, "w") or die("Unable to open file!");

        foreach($data as $item) {

            fwrite($file, $item."\n");
        }

        fclose($file);
    }
}