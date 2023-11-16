<?php

class Controller_ola {
    public function main() {
        $olaModel = new Model_ola();
        if ($olaModel->equals(5,5)){
            $msg = 'igual';
            require_once("view_ola.php");
        }
        else {
            echo 'n igual';
        }
        
    }
    public function test() {
        $olaModel = new Model_ola();
        var_dump($olaModel->equals(3,5));
        var_dump($olaModel->equals(5,5));
        echo "Teste";
    }

    
}