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

class Salle {
    private $type;
    private $event;
    private $experience;
    private $monstre;
    public function __construct($type, $event, $experience, $monstre) {
        $this->type = $type;
        $this->event = $event;
        $this->experience = $experience;
        $this->monstre = $monstre;
    }

    public function getType() {
        return $this->type;
    }

    public function getEvent() {
        return $this->event;
    }
    
    public function getExperience() {
        return $this->experience;
    }

    public function getMonstre() {
        return $this->monstre;
    }

}

class Salle_speciale extends Salle {
    public function __construct($type, $event, $experience, $monstre) {
        parent::__construct($type, $event, $experience, $monstre);
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

class Objet {
    private $nom;
    private $type;
    private $malediction;
    private $value;
    public function __construct($nom, $type, $malediction, $value) {
        $this->nom = $nom;
        $this->type = $type;
        $this->malediction = $malediction;
        $this->value = $value;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getType() {
        return $this->type;
    }

    public function getMalediction() {
        return $this->malediction;
    }

    public function getValue() {
        return $this->value;
    }
}

class DAO {
    private $bdd;
    public function __construct($bdd) {
        $this->bdd = $bdd;
    }

    public function addObject($objet)
    {
        try {
            $requete = $this->bdd->prepare("INSERT INTO objet (nom, type, malediction, value) VALUES (?, ?, ?, ?)");
            $requete->execute([$objet->getNom(), 
                               $objet->getType(), 
                               $objet->getMalediction(), 
                               $objet->getValue()
                            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur d'ajout du objet: " . $e->getMessage();
        }
    }
    
    public function addSalle($salle)
    {
        try {
            $requete = $this->bdd->prepare("INSERT INTO salle (type, event, expSalle, monstre_id) VALUES (?, ?, ?, ?)");
            $requete->execute([$salle->getType(),
                               $salle->getEvent(), 
                               $salle->getExperience(), 
                               $salle->getMonstre()
                            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur d'ajout de la salle: " . $e->getMessage();
        }
    }

    public function addMonstre($monstre)
    {
        try {
            $requete = $this->bdd->prepare("INSERT INTO monstre (nom, pd, pa, pv) VALUES (?, ?, ?, ?)");
            $requete->execute([$monstre->getNom(), 
                               $monstre->getPD(), 
                               $monstre->getPA(), 
                               $monstre->getPV()
                            ]);
            return true;
        } catch (PDOException $e) {
            echo "Erreur d'ajout du monstre: " . $e->getMessage();
        }
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
            $row = $this->bdd->prepare("SELECT * FROM inventaire");
            $row->execute();
        } catch (PDOException $e) {
            echo "Erreur pour l'inventaire: " . $e->getMessage();
            return false;
        }
    }

    public function getObjet() {
        try {
            $row = $this->bdd->prepare("SELECT * FROM objet WHERE type = 0");
            $row->execute();
            $tempBut = array(); 
            while ($rowItem = $row->fetch(PDO::FETCH_ASSOC)) {
                $tempBut[] = $rowItem;
            }
            $butin->setButinClassique($tempBut);
            $row2 = $this->bdd->prepare("SELECT * FROM objet WHERE type = 1");
            $row2->execute();
            $tempBut2 = array(); 
            while ($rowItem2 = $row->fetch(PDO::FETCH_ASSOC)) {
                $tempBut2[] = $rowItem2;
            }
            $butin->setButinSpecial($tempBut2);
            return true;
        } catch (PDOException $e) {
            echo "Erreur pour l'inventaire: " . $e->getMessage();
            return false;
        }
    }
    

    public function getSave() {
        try {
            echo "Voici les sauvegardes > ";
            $row = $this->bdd->prepare("SELECT * FROM save");
            $row->execute();
            $userSelection = readline(">");
            $row2 = $this->bdd->prepare("SELECT * FROM save WHERE id = ?", [$userSelection]);
            $row2->execute();
            return true;
            $row = "";
        } catch (PDOException $e) {
            echo "Erreur pour l'inventaire: " . $e->getMessage();
            return false;
        }
    }
}

$DAO = new DAO($connexion);
// $objet = new Objet("epee", 1, 0, 10);
// $DAO->addObject($objet);

// $personnage = new Personnage("Raph", 200, 50, 40, 125);
// print_r($personnage);

// $salle = new Salle(0, 0, 1, 1);
// $DAO->addSalle($salle);
// print_r($salle);

// $monstre = new Monstre("Mechant 2", 50, 40, 180);
// $DAO->addMonstre($monstre);

$butin = new Butin();
$butin->setButinClassique(["epee", "gants", "casque"]);
$butin->setButinSpecial(["grosse epee", "gants metal", "casque metal"]);
// print_r($butin);

$salle_special = new Salle_speciale(1, 0, 3, 4);
// print_r($salle_special);

$a = 0;

while ($a === 0) {
    echo "Bienvenue dans Donjon & Dragon !\n\n";
    sleep(1);
    echo "Que souhaites-tu faire ?\n1 - Jouer\n2 - Voir l'inventaire\n3 - Voir les personnages\n4 - Créer un personnage\n5 - Récuperer une sauvegarde\n6 - Quitter\n";
    $choice = readline("> ");
    switch ($choice) {
        case 1:
            
            break;
        case 2:
            break;
        case 3:
            break;
        case 4:
            break;
        case 5:
            break;
        case 6:
            $a = 1;
            break;
        default:
            echo "Choix impossible !\n";
            break;
    }
}
?>