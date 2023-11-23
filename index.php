<?php

include 'config.php';

class Personnage {
    private $nom;
    private $PV;
    private $PA;
    private $PD;
    private $XP;
    private $niveau;
    private $evolution;
    private $inventaire;

    public function __construct($nom, $PV, $PD, $PA, $XP) {
        $this->nom = $nom;
        $this->PV = $PV;
        $this->PA = $PA;
        $this->PD = $PD;
        $this->XP = $XP;
        $this->niveau = 1;
        $this->evolution = array();
        $this->inventaire = array();
    }

    // BONNE IDEE , METTRE DES SETS A LA PLACE DES THIS, ET PAS METTRE L'XP A 0 MAIS XP TOTAL - XP DU NIVEAU D'AVANT
    public function evoluer() {
        $this->PA += 5;
        $this->PD += 3;
        $this->niveau++;
        $this->XP = 0;
    }

    public function getNom() {
        return $this->nom;
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

    public function getEvolution() {
        return $this->evolution;
    }
    public function getInventaire() {
        return $this->inventaire;
    }
    public function getNiveau() {
        return $this->niveau;
    }
    public function affronterMonstre($monstre) {
        echo $this->nom . " affrontez le monstre " . $monstre->getNom() . " !<br>";
    }

}   

class Salle {
    private $event;
    private $monstre;
    public function __construct($event,  $monstre = null) {
        $this->event = $event;
        $this->monstre = $monstre;
    }

    public function getEvent() {
        return $this->event;
    }
    public function getMonstre() {
        return $this->monstre;
    }

}
class Monstre {
    private $nom;
    private $PV;
    private $PA;
    private $PD;

    public function __construct($nom, $PV, $PA, $PD) {
        $this->nom = $nom;
        $this->PV = $PV;
        $this->PA = $PA;
        $this->PD = $PD;
    }

    public function getNom() {
        return $this->nom;
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

class DAO {
    private $bdd;
    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function createNewPerso($personnage) {
        try {
            $row = $this->bdd->prepare("INSERT INTO personnage (nom,pv,pa,pd,pds,exp,niveau,evolution,inventaire_id) VALUES (?,?,?,?,?,?,?,?,?)");
            $row->execute([
                $personnage->getNom(),
                $personnage->getPv(),
                $personnage->getPa(),
                $personnage->getPd(),
                $personnage->getPds(),
                $personnage->getExp(),
                $personnage->getNiveau(),
                $personnage->getEvolution(),
                $personnage->getInventaire_id()            
            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur lors de l'ajout du joueur: " . $e->getMessage();
            return false;
        }
    }

    public function selectParty() {}

    public function showCurrentCharaInventory () {
        try {
            $row = "";
        } catch (PDOException $e) {
            echo "Erreur pour l'inventaire: " . $e->getMessage();
            return false;
        }
    }
}

$DAO = new DAO($bdd);

$personnage = new Personnage("Raph", 200, 50, 40, 125);
print_r($personnage);
$salle = new Salle(2);
print_r($salle);

$butin = new Butin();
$butin->setButinClassique(["epee", "gants", "casque"]);
$butin->setButinSpecial(["grosse epee", "gants metal", "casque metal"]);
print_r($butin);

$salle_special = new Salle_speciale("piege");
print_r($salle_special);
?>