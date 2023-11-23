<?php 

class Salle {
    private $event;
    public function __construct($event) {
        $this->event = $event;
    }

    public function getEvent() {
        return $this->event;
    }
}

class Salle_speciale extends Salle {
    public function __construct($event) {
        parent::__construct($event);
    }
}

class Butin {
    private $butin_classique;
    private $butin_special;
    public function __construct() {
        $this->butin_classique = array();
        $this->butin_special = array();
    }

    public function getButinClassique() {
        return $this->butin_classique;
    }

    public function setButinClassique($butin_classique) {
        $this->butin_classique = $butin_classique;
    }

    public function setButinSpecial($butin_special) {
        $this->butin_special = $butin_special;
    }

    public function getButinSpecial() {
        return $this->butin_special;
    }
}

$salle = new Salle(2);
print_r($salle);

$butin = new Butin();
$butin->setButinClassique(["epee", "gants", "casque"]);
$butin->setButinSpecial(["grosse epee", "gants metal", "casque metal"]);
print_r($butin);

$salle_special = new Salle_speciale("piege");
print_r($salle_special);
?>