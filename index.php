<?php
class personage {
    private $PV;
    private $PA;
    private $PD;

        public function __construct($PV, $PA, $PD){
            $this-> PV = $PV;
            $this-> PA = $PA;
            $this-> PD = $PD; 
        }

        public function getPV() {
            return $this ->PV;
        }

        public function getPA() {
            return $this ->PA;
        }

        public function getPD() {
            return $this ->PD;
        }

}









?>