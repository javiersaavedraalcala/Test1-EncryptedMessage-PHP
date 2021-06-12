<?php

require_once('DocumentManager.php');

class DecryptMessage
{
    private $M1;
    private $M2;
    private $N;
    private $instructionOne;
    private $instructionTwo;
    private $message;


    public function __construct()
    {
        $docManager = new DocumentManager();
        $contentFile = $docManager->getContentFromFile('input-data.txt');
        
        $arrayContent = explode("|",$contentFile);

        $this->M1 = $arrayContent[0];
        $this->M2 = $arrayContent[1];
        $this->N = $arrayContent[2];
        $this->instructionOne = $arrayContent[3];
        $this->instructionTwo = $arrayContent[4];
        $this->message = $arrayContent[5];
    }

    public function getResults()
    {

        $resultInstOne = $this->checkIfInstructionExistInMessage($this->M1, $this->instructionOne, $this->message) ? 'Si' : 'No';
        $resultInstTwo = $this->checkIfInstructionExistInMessage($this->M2, $this->instructionTwo, $this->message) ? 'Si' : 'No';

        echo 'Instrucción uno: ' . $resultInstOne;
        echo '<br>';
        echo 'Instrucción dos: ' . $resultInstTwo;
        echo '<br><br>';

        DocumentManager::generateFile('output-data.txt', [$resultInstOne, $resultInstTwo]);

        echo 'Output file generated successfully';
        
    }

    private function checkIfInstructionExistInMessage($instructionNumber, $instructionText, $message)
    {
        $counter = 0;

        $splitInstruction = str_split($instructionText);

        foreach($splitInstruction as $char) {
            if(strpos($message, $char)) {
                $counter ++;
            }
        }

        if($instructionNumber == $counter) {
            return true;
        }else {
            return false;
        }

    }


}