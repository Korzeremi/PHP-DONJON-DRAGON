<?php

class Personnage {
    private $PV;
    private $PA;
    private $PD;
    private $XP;
    private $niveau;

    public function __construct($PV, $PD, $PA, $XP) {
        $this->PV = $PV;
        $this->PA = $PA;
        $this->PD = $PD;
        $this->XP = $XP;
        $this->niveau = 1;
    }

    public function evoluer() {
        $this->PA += 5;
        $this->PD += 3;
        $this->niveau++;
        $this->XP = 0;
    }

    public function getPV() {
        return $this->PV;
    }

    public function getPA() {
        return $this->PA;
    }

    public function getPD() {
        return $this->PD;
    }

    public function getXP() {
        return $this->XP;
    }

    public function getNiveau() {
        return $this->niveau;
    }
}

?>